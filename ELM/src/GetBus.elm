module GetBus exposing (..)
import Browser
import Html exposing (..)
import Html.Attributes exposing (..)
import Html.Events exposing (..)
import Http


type alias Bus = {
    route: String
    , selecttype: String
    , json: String
    }

myBus: Bus
myBus = {
    route = ""
    , selecttype = ""
    , json = ""
    }


type Msg = 
    RouteEntered String | SeletEntered String
    | SendHttpRequest 
    | DataReceived (Result Http.Error String)

myView: Bus -> Html Msg
myView busRecord =
    div [][
        h1 [][text "Bus Search Function"]
        ,div [][
                text "Type:" 
                , input [id "selecttype",type_ "text", onInput SeletEntered][]
            ]
            , div [][
                text "keyword:"
                , input [id "route", type_ "text", onInput RouteEntered][]
            ]
            , div [][
                button [type_"submit", onClick SendHttpRequest][text "Search"]
            ]
        ,div [][text busRecord.selecttype]
        ,div [][text busRecord.route ]
        ,div [][text busRecord.json ]
    ]


--Supporting Functions
getBusDetails: Bus -> Cmd Msg
getBusDetails busDetails =
    Http.get 
    { url = String.concat["http://localhost/ATWD1/Controller.php/route/", busDetails.selecttype,"/",busDetails.route]
    , expect = Http.expectString DataReceived -- DataReceived is a message type
    }


--Update
myUpdate: Msg -> Bus -> (Bus, Cmd Msg)
myUpdate msg busDetails =
    case msg of
        RouteEntered routeInput -> ({busDetails | route = routeInput}, Cmd.none)
        SeletEntered selecttypeInput -> ({busDetails | selecttype = selecttypeInput}, Cmd.none)
        SendHttpRequest -> (busDetails, getBusDetails busDetails)
        DataReceived (Ok serverResponse) -> ({busDetails | json=serverResponse}, Cmd.none) 
        DataReceived (Err _) -> (busDetails, Cmd.none)

--Initialization function
myInit: () -> (Bus, Cmd Msg)
myInit _ = 
    (myBus, Cmd.none)

--Main
main: Program () Bus Msg
main =
    Browser.element {
        init = myInit
        , view = myView 
        , update = myUpdate 
        , subscriptions = \_ -> Sub.none
    }