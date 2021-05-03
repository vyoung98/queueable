import { Component } from '@angular/core';

import { Friend } from '../friend';
import { Observable, throwError} from 'rxjs';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';
import { HttpClientModule } from '@angular/common/http';

import { Injectable } from '@angular/core';
import { catchError, retry } from 'rxjs/operators';

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
  activity = ['Game', 'Show', 'Book'];
  model = new Friend('Viv', 'Val', 'viv@gmail.com', 'val@gmail.com', this.activity[0], 'I want to play Stardew Valley with you!');
  model2 = new Friend('', '', '', '', '', 'I want to play INSERT GAME with you!');
  model3 = new Friend('', '', '', '', '', 'I want to watch INSERT SHOW with you!');
  model4 = new Friend('', '', '', '', '', 'I want to read INSERT BOOK with you!');

  onSubmit() { this.submitted = true; }

  newFriend() {
    // blank friend object
    this.model = new Friend('', '', '', '', '', '');

  }
  status: boolean = false;
  isValid() {
    
  } 


  //testing
  constructor(private http: HttpClient) { }

  setUser2(friend: Friend): void{ //git user email
    this.http.get('http://localhost/CS-4640-Project/PHP/getUser.php',{withCredentials:true})
    .subscribe(
    (data)=>{
      friend["name"]=(friend.f_name);
    });

  }

  redirect(): void{
    window.location.href = "http://localhost/CS-4640-Project/PHP/requirementsPage.php";
  }
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

    setTimeout(function(){ window.location.href = "http://localhost/queueable/queue.php"; }, 10000);
    
  }

  sendPost(data: any): Observable<any>{ 
    //send post to PHP
    return this.http.post('hhttp://localhost/queueable/ngphp-post.php', data);
  }


  // ngOnInit() {
  //     const headers = { 'Authorization': 'Bearer my-token', 'My-Custom-Header': 'foobar' };
  //     const body = { title: 'Angular POST Request Example' };
  //     this.http.post<any>('https://reqres.in/api/posts', body, { headers }).subscribe(data => {
  //         this.model.f_name = data.id;
  //     });
  // }
}
