import Wallet from '../app/components/Wallet';
import Market from '../components/Market';
import Chat from '../app/components/Chat';
import MyWorks from '../app/components/MyWorks';
import Profile from '../app/components/Profile';
import Home from '../homepage/components/Home';
import Login from '../homepage/components/Login';
import SignIn from '../homepage/components/SignIn';

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
				title: 'How It Works',
				path: '/#HowItWorks',
				component: Home,
			},
			{
				title: 'Contact',
				path: '/#contact',
				component: Home,
			},
			{
				title: 'Market',
				path: '/market',
				component: Market,
			},
			{
				title: 'Login',
				path: '/login',
				component: Login,
			},
			{
				title: 'Sign In',
				path: '/SignIn',
				component: SignIn,
			},
		],
	},
];
