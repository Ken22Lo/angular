import { Component, OnInit,  Output, EventEmitter, Input} from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { HttpClient, HttpResponse, HttpHeaders } from '@angular/common/http';
import { BusRecord } from '../BusRecord.model';
import { ChangeDetectionStrategy, OnChanges } from '@angular/core';

@Component({
  selector: 'app-delete-bus',
  templateUrl: './delete-bus.component.html',
  styleUrls: ['./delete-bus.component.css'],
  changeDetection: ChangeDetectionStrategy.OnPush
})

export class DeleteBusComponent implements OnInit, OnChanges {
  @Input() busRecord!: BusRecord;

  deleteBusForm: FormGroup;
  http: HttpClient;
  serverData: Object | null;
  message: string = "hello";
  url: string;
  searchType: string;

  constructor(fb: FormBuilder, http: HttpClient) { 
    this.http = http;
    this.serverData = null;
    this.url = "";
    this.searchType = "";
    
    this.deleteBusForm = fb.group(
      {
        'routeNumber': ['', Validators.required],
        'fare': ['', Validators.required],
        'startPoint': ['', Validators.required],
        'endPoint': ['', Validators.required]
      }
    );

  }

  ngOnInit(): void {
    console.log("DeleteBus: ngOnInit()");
  }

  ngOnChanges() {
    console.log("Delete: ngOnChanges()");
    this.deleteBusForm.controls['routeNumber'].setValue(this.busRecord.routeNumber);
    this.deleteBusForm.controls['fare'].setValue(this.busRecord.fare);
    this.deleteBusForm.controls['startPoint'].setValue(this.busRecord.startPoint);
    this.deleteBusForm.controls['endPoint'].setValue(this.busRecord.endPoint);
  }

  onSubmit(formValue: any): void {
    this.serverData = null;
    
    this.url = "http://localhost/ATWD1/Controller.php/" + 'route' + '/'+ formValue['routeNumber'];
    this.http.delete<any>(
      this.url
      ).subscribe(
      res => {  // anonymous function
        console.log("Server return: " + res);
        this.serverData = res;
      },  
      res => {  // anonymous function
        console.log("Server error: " + res);
      }
    );

    }
  }

