import React from 'react';
import { BrowserRouter, NavLink, Route, Switch } from 'react-router-dom';
import AboutUs from './AboutUs';
import Chat from './Chat';
import FAQ from './FAQ';
import MyWorks from './MyWorks';
import Market from './Market';
import Profile from './Profile';
import SignIn from './SignIn';
import Wallet from './Wallet';
import Home from './Home';

export default function NavBar() {
	const state = {
		routes: [
			{
				title: 'Home',
				path: '/',
				component: Home,
				exact: true,
			},
			{
				title: 'Wallet',
				path: '/wallet',
				component: Wallet,
			},
			{
				title: 'Chat',
				path: '/chat',
				component: Chat,
			},
			{
				title: 'My Works',
				path: '/:user/works',
				component: MyWorks,
			},
			{
				title: 'Profile',
				path: '/me',
				component: Profile,
			},
			{
				title: 'Market',
				path: '/market',
				component: Market,
			},
		],
	};

	return (
		<BrowserRouter>
			<ul className='menu'>
				{state.routes.map((route, index) => (
					<li key={index} className='item'>
						<NavLink
							to={route.path}
							exact={route.exact}
							activeClassName='active'>
							{route.title}
						</NavLink>
					</li>
				))}
			</ul>
			<Switch>
				{state.routes.map((route, index) => (
					<Route
						key={index}
						path={route.path}
						exact={route.exact}
						component={route.component}
					/>
				))}
			</Switch>
		</BrowserRouter>
	);
}
