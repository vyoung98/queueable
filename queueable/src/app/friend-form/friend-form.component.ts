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

  confirm_msg = "Sent!";
  submitted = false;
  done = false;
  // creating the pre-populated friend object
  activity = ['Game', 'Show', 'Book'];
  model = new Friend('', '', '', '', this.activity[1], '');
  model2 = new Friend('', '', '', '', '', 'I want to play INSERT GAME with you!');
  model3 = new Friend('', '', '', '', '', 'I want to watch INSERT SHOW with you!');
  model4 = new Friend('', '', '', '', '', 'I want to read INSERT BOOK with you!');

  onSubmit() { this.submitted = true; }

  newFriend() {
    // blank friend object
    this.model = new Friend('', '', '', '', '', '');

  }


  //testing
  constructor(private http: HttpClient) { }

  confirmSubmit(friend: Friend): void{
    
    // submits and send post information to post file
    this.confirm_msg += " " + friend.name + ", you have sent your friend request to " + friend.f_name + ". ";
    this.done = true;
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

}
