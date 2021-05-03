// import {Http} from '@angular/http';
// import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

export class Friend {

    constructor(
      // private http: HttpClient,
      public name: string,
      public f_name: string,
      public email: string,
      public f_email: string,
      public message: string,
    ) { }
  
  }