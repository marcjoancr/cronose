import React from 'react';
import AboutUs from './AboutUs';
import Chat from './Chat';
import FAQ from './FAQ';
import MyWorks from './MyWorks';
import Market from './Market';
import Profile from './Profile';
import SignIn from './SignIn';
import Wallet from './Wallet';
import Home from './Home';
import SideBar from './SideBar';

export default function NavBar() {
	const state = {
		navigators: [
			{
				basename: 'app',
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
			},
			{
				basename: '',
				routes: [
					{
						title: 'Home',
						path: '/',
						component: Home,
						exact: true,
					},
				],
			},
		],
	};

	return (
		<SideBar
			basename={state.navigators[0].basename}
			routes={state.navigators[0].routes}
		/>
	);
}
