import { Component } from '@angular/core';

import { Friend } from '../friend';

@Component({
  selector: 'app-friend-form',
  templateUrl: './friend-form.component.html',
  styleUrls: ['./friend-form.component.css']
})
export class FriendFormComponent {

  model = new Friend('Viv', 'Val', 'vt5en@virginia.edu', 'vy5br@virginia.edu', 'I want to play Stardew Valley with you!');

  submitted = false;

  onSubmit() { this.submitted = true; }

  newFriend() {
    this.model = new Friend('', '', '', '', '');
  }




}
