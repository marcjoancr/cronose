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
		console.log(this.contextType);
		return (
			<HomePage navigator={navigators.filter((nav) => nav.name == 'root')[0]} />
		);
		const { value } = this.context;
		value.isLogged ? (
			<App navigator={navigators.filter((nav) => nav.name == 'app')[0]} />
		) : (
			<HomePage navigator={navigators.filter((nav) => nav.name == 'root')[0]} />
		);
	}
}
