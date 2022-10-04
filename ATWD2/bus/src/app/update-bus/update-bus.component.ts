import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Component, Input, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: 'app-update-bus',
  templateUrl: './update-bus.component.html',
  styleUrls: ['./update-bus.component.css']
})
export class UpdateBusComponent implements OnInit {

  http: HttpClient;
  serverData: Object | null;
  url: string;
  updateBusForm: FormGroup;

  constructor(fb: FormBuilder, http: HttpClient) { 
    this.http = http;
    this.serverData = null;
    this.url = "";

    this.updateBusForm = fb.group(
      {
        'routeNumber': ['', Validators.required], 
        'COMPANY_CODE': ['', Validators.required], 
        'ROUTE_NAMEC': ['', Validators.required], 
        'ROUTE_NAMES': ['', Validators.required], 
        'ROUTE_NAMEE': ['', Validators.required], 
        'ROUTE_TYPE': ['', Validators.required], 
        'SERVICE_MODE': ['', Validators.required], 
        'SPECIAL_TYPE': ['', Validators.required], 
        'JOURNEY_TIME': ['', Validators.required], 
        'LOC_START_NAMEC': ['', Validators.required], 
        'LOC_START_NAMES': ['', Validators.required], 
        'startPoint': ['', Validators.required],
        'LOC_END_NAMEC': ['', Validators.required], 
        'LOC_END_NAMES': ['', Validators.required], 
        'endPoint': ['', Validators.required],
        'HYPERLINK_C': ['', Validators.required],
        'HYPERLINK_S': ['', Validators.required],
        'HYPERLINK_E': ['', Validators.required],
        'fare': ['', Validators.required], 
        'LAST_UPDATE_DATE': ['', Validators.required]
      }
    );
  }

  onSubmit(formValue: any): void {
    this.serverData = null;
    this.url = "http://localhost/ATWD1/Controller.php/" + 'route' + '/' 
    + formValue['routeNumber'] + '/' + formValue['COMPANY_CODE'] + '/' + formValue['ROUTE_NAMEC'] + '/' 
    + formValue['ROUTE_NAMES'] + '/'  + formValue['ROUTE_NAMEE'] + '/'  + formValue['ROUTE_TYPE'] + '/' 
    + formValue['SERVICE_MODE'] + '/'  + formValue['SPECIAL_TYPE'] + '/'  + formValue['JOURNEY_TIME'] + '/'
    + formValue['LOC_START_NAMEC'] + '/'  + formValue['LOC_START_NAMES'] + '/'  + formValue['startPoint'] + '/'
    + formValue['LOC_END_NAMEC'] + '/'  + formValue['LOC_END_NAMES'] + '/'  + formValue['endPoint'] + '/'
    + formValue['HYPERLINK_C'] + '/'  + formValue['HYPERLINK_S'] + '/'  + formValue['HYPERLINK_E'] + '/'
    + formValue['fare'] + '/'  + formValue['LAST_UPDATE_DATE'];

    this.http.put<any>(
      this.url, 
      {
        routeNumber: formValue['routeNumber'], 
        COMPANY_CODE: formValue['COMPANY_CODE'],
        ROUTE_NAMEC: formValue['ROUTE_NAMEC'],
        ROUTE_NAMES: formValue['ROUTE_NAMES'],
        ROUTE_NAMEE: formValue['ROUTE_NAMEE'],
        ROUTE_TYPE: formValue['ROUTE_TYPE'],
        SERVICE_MODE: formValue['SERVICE_MODE'],
        SPECIAL_TYPE: formValue['SPECIAL_TYPE'],
        JOURNEY_TIME: formValue['JOURNEY_TIME'],
        LOC_START_NAMEC: formValue['LOC_START_NAMEC'],
        LOC_START_NAMES: formValue['LOC_START_NAMES'], 
        startPoint: formValue['startPoint'], 
        LOC_END_NAMEC: formValue['LOC_END_NAMEC'], 
        LOC_END_NAMES: formValue['LOC_END_NAMES'], 
        endPoint: formValue['endPoint'],
        HYPERLINK_C: formValue['HYPERLINK_C'], 
        HYPERLINK_S: formValue['HYPERLINK_S'], 
        HYPERLINK_E: formValue['LHYPERLINK_E'], 
        fare: formValue['fare'], 
        LAST_UPDATE_DATE: formValue['LAST_UPDATE_DATE']
      }
    ).subscribe(
      res => {  // anonymous
        console.log("Server return: " + res);
        this.serverData = res;
      },  
      res => {
        console.log("Server error: " + res);
        //this.serverData = res;
      }
    );
  }

  ngOnInit(): void {
  }

}