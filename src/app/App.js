import React from 'react';
import Footer from '../components/layouts/Footer';
import { NavBar, SideBar } from '../components/layouts/Nav';

export default function App(props) {
	return (
		<div className='container-side'>
			<SideBar
				basename={props.navigator.basename}
				routes={props.navigator.routes}
				refresh={true}
			/>
			<Footer />
		</div>
	);
}
