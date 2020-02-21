import React from 'react';
import Axios from 'axios';
import md5 from 'md5';

export default function Login() {
	function sendLogin(e) {
		e.preventDefault();
		const formData = new FormData(e.currentTarget);
		formData.set('password', md5(formData.get('password')));
		const data = Object.fromEntries(formData);
		login(data);
	}

	function login(data) {
		Axios.post(`${process.env.REACT_APP_API_URL}/login`, JSON.stringify(data))
			.then(function(response) {
				console.log(response);
			})
			.catch(function(error) {
				console.log(error);
			});
	}

	return (
		<>
			<h5 className='card-title text-center'>LOGIN</h5>
			<form
				id='login_form'
				method='post'
				target='_self'
				className='form-signin'
				onSubmit={sendLogin}>
				<div className='form-label-group mt-4'>
					<input
						id='email'
						type='email'
						name='email'
						className='form-control'
						placeholder='email'
						required
						autofocus
					/>
				</div>
				<div className='form-label-group mt-4'>
					<input
						id='password'
						type='password'
						name='password'
						className='form-control'
						placeholder='password'
						required
					/>
				</div>
				<input
					className='btn btn-lg btn-primary btn-block mt-4'
					type='submit'
					value='Submit'
				/>
			</form>
		</>
	);
}
