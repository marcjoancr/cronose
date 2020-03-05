import React, { createContext, Component } from 'react';
import Axios from 'axios';
import qs from 'qs';

export const LoginContext = createContext();

export default class LoginContextProvider extends Component {
	constructor(props) {
		super(props);

		this.state = {
			user: {},
			jwt: '',
			isLogged: false,
		};

		this.login = this.login.bind(this);
		this.logout = this.logout.bind(this);
	}

	login(data) {
		const self = this;
		Axios.post(`${process.env.REACT_APP_API_URL}/login`, qs.stringify(data))
			.then(function(response) {
				self.setState({
					user: response.user,
					jwt: response.jwt,
					isLogged: true,
				});
			})
			.catch(function(error) {
				self.logout(error);
			});

		return this.state.isLogged;
	}

	logout(error) {
		this.setState({ user: {}, jwt: {}, isLogged: false });
	}

	render() {
		return (
			<LoginContext.Provider value={{ ...this.state, login: this.login }}>
				{this.props.children}
			</LoginContext.Provider>
		);
	}
}
