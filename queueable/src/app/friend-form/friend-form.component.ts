import { Component } from '@angular/core';

import { Friend } from '../friend';
import { Observable} from 'rxjs';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-friend-form',
  templateUrl: './friend-form.component.html',
  styleUrls: ['./friend-form.component.css']
})
export class FriendFormComponent {

  model = new Friend('Viv', 'Val', 'viv@gmail.com', 'val@gmail.com', 'I want to play Stardew Valley with you!');

  submitted = false;

  onSubmit() { this.submitted = true; }

  newFriend() {
    this.model = new Friend('', '', '', '', '');

  }
  status: boolean = false;
  isValid() {
    
  } 
  }

  // the following lines break the code
  // constructor(private http: HttpClient){ 
  //   this.sendPost(this.newFriend);
  // }

  // sendPost(data: any): Observable<any>{ 
  //   //send post to PHP
  //   // return "hello";
  //   return this.http.post('http://localhost/CS-4640-Project/PHP/ngphp-post.php', data);
  // }
}
