import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(private http: HttpClient) { }

  getUserDetails(username, password){
    return this.http.post('/php-project/backend/api/auth.php', {
      username,
      password
    }).subscribe(data => {
      console.log(data, 'data posted');
    })

  }
}
