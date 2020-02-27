import React from 'react';
import Axios from 'axios';
import qs from 'qs';

function sendRegister(e) {
	e.preventDefault();
	const formData = new FormData(e.currentTarget);
	const data = Object.fromEntries(formData);
	register(data);
}

function register(data) {
	Axios.post(`${process.env.REACT_APP_API_URL}/register`, qs.stringify(data))
		.then(function(response) {
			console.log('response');
		})
		.catch(function(error) {
			console.log(error);
		});

	var formData = new FormData();
	var imagefile = document.querySelector('#file');
	formData.append('image', imagefile.files[0]);
	// Axio for data
	// Axios.post('upload_file', formData, {
	// 	headers: {
	// 		'Content-Type': 'multipart/form-data',
	// 	},
	// });
}

export default function SignIn() {
	return (
		<section className='signin container'>
			<form
				id='register_form'
				method='post'
				target='_self'
				className='form-signin'
				onSubmit={sendRegister}>
				<div className='form-group'>
					<label for='dni'>DNI:</label>
					<input
						id='dni'
						type='text'
						name='dni'
						className='form-control'
						placeholder='dni'
						required
					/>
				</div>
				<div className='form-group'>
					<label for='name'>Name:</label>
					<input
						id='name'
						type='text'
						name='name'
						className='form-control'
						placeholder='name'
						required
					/>
				</div>
				<div className='form-group'>
					<label for='surname'>Surname:</label>
					<input
						id='surname'
						type='text'
						name='surname'
						className='form-control'
						placeholder='surname'
						required
					/>
				</div>
				<div className='form-group'>
					<label for='surname_2'>Surname 2:</label>
					<input
						id='surname_2'
						type='text'
						name='surname_2'
						className='form-control'
						placeholder='surname'
						required
					/>
				</div>
				<div className='form-group'>
					<label for='email'>Email:</label>
					<input
						id='email'
						type='email'
						name='email'
						className='form-control'
						placeholder='email'
						required
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
				<div className='form-label-group mt-4 text-left'>
					<label htmlFor='r_password'>Repeat password</label>
					<input
						id='r_password'
						type='password'
						name='r_password'
						className='form-control'
						placeholder='password'
						required
					/>
				</div>
				<div className='form-label-group mt-4 text-left'>
					<label htmlFor='province'>Province</label>
					<select
						id='province'
						name='province'
						className='form-control'
						required
					/>
				</div>
				<div className='form-label-group mt-4 text-left'>
					<label htmlFor='city'>City</label>
					<select id='city' name='city' className='form-control' required />
				</div>
				<div className='form-group'>
					<label htmlFor='file'>Avatar</label>
					<input
						id='file'
						type='file'
						name='file'
						className='form-control-file'
						required></input>
				</div>
				<div className='form-label-group mt-4 text-left'>
					<label htmlFor='private'>Private account</label>
					<input id='private' name='private' type='checkbox' />
				</div>
				<input
					className='btn-login btn btn-lg btn-primary btn-block mt-4'
					type='submit'
					value='Submit'
				/>
			</form>
		</section>
	);
}
