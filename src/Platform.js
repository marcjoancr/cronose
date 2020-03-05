import React, { Component } from 'react';
import HomePage from './homepage/HomePage';
import App from './app/App';

import navigators from './configs/navigators.js';
import LoginContextProvider, { LoginContext } from './contexts/LoginContext';

export default class Platform extends Component {
	static contextType = LoginContext;

	constructor() {
		super();
		this.state = {};
	}

	render() {
		return (
			<LoginContextProvider>
				<HomePage
					navigator={navigators.filter((nav) => nav.name == 'root')[0]}
				/>
			</LoginContextProvider>
		);
	}
}
