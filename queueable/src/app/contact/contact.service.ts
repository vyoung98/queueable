import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { retry } from 'rxjs/operators';

import { Contact } from './model/contact.model';
import { environment } from '../../environments/environment';

@Injectable()
export class ContactService {
	constructor(private http: HttpClient) { }

	// sendMail(contact: Contact): Observable<object> {
	// 	//Setting json header so other applications can parse our message.
	// 	const headers = new HttpHeaders({ 'Content-Type': 'application/json' });
	// 	return this.http.post(environment.target, JSON.stringify(contact), { headers: headers })
	// 		.pipe(
	// 			//When it fails, we're going to retry 3 times.
	// 			retry(3)
	// 		);
	// }
}