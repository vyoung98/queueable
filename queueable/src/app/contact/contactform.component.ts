import { Component, OnInit } from '@angular/core';
import { ToastrService } from 'ngx-toastr';

import { ContactService } from './contact.service';
import { Contact } from './model/contact.model';

@Component({
	selector: 'contactform',
	templateUrl: './contactform.component.html',
	//This is just for styling and will add the class "row" to the parent-tag
	host: { 'class': 'row' }
})
export class ContactFormComponent implements OnInit {
	contact: Contact = new Contact();
	loading = true;

	constructor(private contactService: ContactService, private toastr: ToastrService) { }

	ngOnInit() {
		this.loading = false;
	}

	onSubmit() {
		this.loading = true;
		//Don't forget to subscribe on an observable, or it will never be called.
		this.contactService.sendMail(this.contact).subscribe(
			() => {
				//Success
				this.contact = new Contact();
				this.loading = false;
				this.toastr.success('Message send.');
			},
			() => {
				//Failed
				this.loading = false;                
				this.toastr.error('Woops, something went wrong.');
			}
		);
	}
}