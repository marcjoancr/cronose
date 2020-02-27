import React from 'react';
import Axios from 'axios';
import md5 from 'md5';
import qs from 'qs';
import { LoginContext } from '../../contexts/LoginContext';

export default function Login() {
	function login(e) {
		e.preventDefault();
		const formData = new FormData(e.currentTarget);
		formData.set('password', md5(formData.get('password')));
		const data = Object.fromEntries(formData);
		login(data);
	}

	return (
		<LoginContext.Consumer>
			{(context) => {
				return (
					<div className='card-login card text-center'>
						<h3 className='card-title text-center'>LOGIN</h3>
						<form
							id='login_form'
							method='post'
							target='_self'
							className='form-signin'
							onSubmit={login}>
							<div className='form-label-group mt-4 text-left'>
								<label htmlFor='email'>Email</label>
								<input
									id='email'
									type='email'
									name='email'
									className='form-control'
									placeholder='email'
									required
									autoFocus
								/>
							</div>
							<div className='form-label-group mt-4 text-left'>
								<label htmlFor='password'>Password</label>
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
								className='btn-login btn btn-lg btn-primary btn-block mt-4'
								type='submit'
								value='Submit'
							/>
						</form>
						<div className='card-footer'>
							<div className='justify-content-center links'>
								Don't have an account? <a href='#'> Sign Up</a>
							</div>
							<div className=' justify-content-center'>
								<a href='#'>Forgot your password?</a>
							</div>
						</div>
					</div>
				);
			}}
		</LoginContext.Consumer>
	);
}
