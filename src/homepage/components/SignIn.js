import React, { Component } from 'react';
import Axios from 'axios';

export default class SignIn extends Component {
	constructor(props) {
		super(props);
		this.state = { province: [], cities: [] };
		this.register = this.register.bind(this);
		this.getProvinces = this.getProvinces.bind(this);
		this.getCities = this.getCities.bind(this);
	}

	componentDidMount() {
		this.getProvinces();
	}

	register(e) {
		e.preventDefault();
		const formData = new FormData(e.currentTarget);
		Axios.post(`${process.env.REACT_APP_API_URL}/register`, formData, {
			headers: {
				'Content-Type':
					'multipart/form-data; boundary=899579491390198298378346',
			},
		})
			.then(function(response) {
				console.log(response);
			})
			.catch(function(error) {
				console.log(error);
			});
	}

	getProvinces() {
		Axios.get(`${process.env.REACT_APP_API_URL}/provinces`)
			.then((response) =>
				this.setState({ province: response.data || this.state.province })
			)
			.catch((err) => console.error(err));
	}

	getCities() {
		const province_id = document.getElementById('province_id').value;
		Axios.get(`${process.env.REACT_APP_API_URL}/cities/${province_id}`)
			.then((response) => {
				this.setState({ cities: response.data || this.state.cities });
				const cities = document.getElementById('cities');
			})
			.catch((err) => console.error(err));
	}

	render() {
		return (
			<section className='signin container'>
				<form
					id='register_form'
					method='post'
					target='_self'
					className='form-signin'
					onSubmit={this.register}>
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
						<label htmlFor='province_id'>Province</label>
						<select
							id='province_id'
							name='province_id'
							className='form-control'
							onChange={this.getCities}
							required>
							<option value='0' selected='selected'>
								Select province
							</option>
							{this.state.province.map((province, index) => (
								<option value={province.id}>{province.name}</option>
							))}
						</select>
					</div>
					<div className='form-label-group mt-4 text-left'>
						<label htmlFor='city_cp'>City</label>
						<select
							id='city_cp'
							name='city_cp'
							className='form-control'
							required>
							<option selected='selected' disabled>
								Select City
							</option>
							{this.state.cities.map((cities, index) => (
								<option value={cities.cp}>{cities.name}</option>
							))}
						</select>
					</div>
					<div className='form-group'>
						<label htmlFor='dni_img'>DNI</label>
						<input
							id='dni_img'
							type='file'
							name='dni_img'
							className='form-control-file'
							required></input>
					</div>
					<div className='form-group'>
						<label htmlFor='avatar'>Avatar</label>
						<input
							id='avatar'
							type='file'
							name='avatar'
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
}
