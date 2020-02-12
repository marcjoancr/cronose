import React from 'react';
import { NavBar, SideBar } from '../components/layouts/Nav';

export default function HomePage(props) {
	return (
		<>
			<NavBar
				basename={props.navigator.basename}
				routes={props.navigator.routes}
				refresh={true}
			/>
		</>
	);
}
