import Wallet from '../components/Wallet';
import Market from '../components/Market';
import Chat from '../components/Chat';
import MyWorks from '../components/MyWorks';
import Profile from '../components/Profile';
import Home from '../homepage/components/Home';

export default [
	{
		name: 'app',
		basename: 'app',
		routes: [
			{
				title: 'Market',
				path: '/market',
				component: Market,
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
		],
	},
	{
		name: 'root',
		basename: '',
		routes: [
			{
				title: 'Home',
				path: '/',
				component: Home,
				exact: true,
			},
			{
				title: 'About Us',
				path: '/#about',
				component: Home,
			},
			{
				title: 'Market',
				path: '/market',
				component: Market,
			},
		],
	},
];
