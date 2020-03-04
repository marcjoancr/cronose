import Wallet from '../app/components/Wallet';
import Market from '../components/Market';
import Chat from '../app/components/Chat';
import MyWorks from '../app/components/MyWorks';
import Profile from '../app/components/Profile';
import Home from '../homepage/components/Home';
import Login from '../homepage/components/Login';
import SignIn from '../homepage/components/SignIn';
import WorkDetail from '../components/WorkDetail';
import NewOffer from '../app/components/NewOffer';
import { IoMdChatboxes, IoIosChatbubbles } from 'react-icons/io';
import { FaStore } from 'react-icons/fa';
import { GiTwoCoins } from 'react-icons/gi';
import { MdWork } from 'react-icons/md';
import { GoPerson } from 'react-icons/go';

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
				icon: FaStore,
			},
			{
				title: 'Work Details',
				path: '/work',
				component: WorkDetail,
			},

			{
				title: 'New Offer',
				path: '/newoffer',
				component: NewOffer,
			},
			{
				title: 'Wallet',
				path: '/wallet',
				component: Wallet,
				icon: GiTwoCoins,
			},
			{
				title: 'Chat',
				path: '/chat',
				component: Chat,
				icon: IoIosChatbubbles,
			},
			{
				title: 'My Works',
				path: '/:user/works',
				component: MyWorks,
				icon: MdWork,
			},
			{
				title: 'Profile',
				path: '/me',
				component: Profile,
				icon: GoPerson,
			},
			{
				title: 'Home',
				path: '/home',
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
				title: 'Work Details',
				path: '/work',
				component: WorkDetail,
			},
			{
				title: 'Login',
				path: '/login',
				component: Login,
			},
			{
				title: 'Register',
				path: '/register',
				component: SignIn,
			},
		],
	},
];
