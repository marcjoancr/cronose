import React from 'react';

export default function SignIn() {
	return (
		<section className='signin container'>
			<div className='form-group'>
				<label for='signImput'>Sign In:</label>
				<input
					type='text'
					className='form-control'
					id='signImput'
					placeholder='Introduzca su usuario'
				/>
			</div>
			<div className='form-group'>
				<label for='password'>Contraseña:</label>
				<input
					type='password'
					className='form-control'
					id='password'
					placeholder='Contraseña'
				/>
			</div>
		</section>
	);
}
