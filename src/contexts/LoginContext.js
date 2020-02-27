import React, { createContext, Component } from 'react';

export const LoginContext = createContext();

export default class LoginContextProvider extends Component {
	state = {
		user: {},
		jwt: '',
		isLogged: false,
	};

	login(data) {
		Axios.post(`${process.env.REACT_APP_API_URL}/login`, qs.stringify(data))
			.then(function(response) {
				this.setState({
					user: response.user,
					jwt: response.jwt,
					isLogged: true,
				});
			})
			.catch(function(error) {
				logout();
			});

		return this.state.isLogged;
	}

	logout() {
		this.setState({ user: {}, jwt: {}, isLogged: false });
	}

	render() {
		return (
			<LoginContext.Provider value={{ ...this.state }}>
				{this.props.children}
			</LoginContext.Provider>
		);
	}
}
