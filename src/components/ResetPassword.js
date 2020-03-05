import React from 'react';

export default function ResetPassword() {
	return (
		<div className='reset-pass card text-center'>
			<h3 className='card-title text-center'>Reset Password</h3>
			<form
				id='password_post'
				method='post'
				target='_self'
				className='form-signin'>
				<div className='form-label-group mt-4 text-left'>
					<label htmlFor='password'>New Password</label>
					<input
						id='newpassword1'
						type='password'
						name='newpassword1'
						className='form-control'
						placeholder=''
						required
					/>
				</div>
				<div className='form-label-group mt-4 text-left'>
					<label htmlFor='password'>Repeat the Password</label>
					<input
						id='newpassword2'
						type='password'
						name='newpassword2'
						className='form-control'
						placeholder=' '
						required
					/>
				</div>
				<input
					className=' btn btn-lg btn-primary btn-block mt-4'
					type='submit'
					value='Change Password'
					required
				/>
			</form>
		</div>
	);
}
