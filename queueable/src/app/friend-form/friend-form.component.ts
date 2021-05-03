import { Component } from '@angular/core';

import { Friend } from '../friend';
import { Observable, throwError} from 'rxjs';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';

import { Injectable } from '@angular/core';
import { catchError, endWith, retry } from 'rxjs/operators';

@Injectable()
export class ConfigService {
  constructor(private http: HttpClient) { }
}

@Component({
  selector: 'app-friend-form',
  templateUrl: './friend-form.component.html',
  styleUrls: ['./friend-form.component.css']
})
export class FriendFormComponent {

  confirm_msg = "";
  submitted = false;
  done = false;
  // creating the pre-populated friend object
  model = new Friend('Viv', 'Val', 'viv@gmail.com', 'val@gmail.com', 'I want to play Stardew Valley with you!');

  onSubmit() { this.submitted = true; }

  newFriend() {
    // blank friend object
    this.model = new Friend('', '', '', '', '');

  }


  //testing
  constructor(private http: HttpClient) { }

  confirmSubmit(friend: Friend): void{
    
    // submits and send post information to post file
    this.confirm_msg += friend.name + " and " + friend.f_name + "are now friends!";
    this.done = true;

    // console.log(course);
    this.sendPost(friend).subscribe(
      res=>{
        console.log(res);
      }
    )

    //setTimeout(function(){ window.location.href = "http://localhost/queueable/queue.php"; }, 10000);
    
  }
  sendPost(data: any): Observable<any>{ 
    //send post to PHP
    return this.http.post('http://localhost/queueable/ng-post.php', data, {responseType:'text'});

  }


  // ngOnInit() {
  //     const headers = { 'Authorization': 'Bearer my-token', 'My-Custom-Header': 'foobar' };
  //     const body = { title: 'Angular POST Request Example' };
  //     this.http.post<any>('https://reqres.in/api/posts', body, { headers }).subscribe(data => {
  //         this.model.f_name = data.id;
  //     });
  // }
}
