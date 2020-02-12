import React from 'react';
import HomePage from './homepage/HomePage';
import Footer from './components/layouts/Footer';

import navigators from './configs/navigators.js';

export default function Platform() {
	const state = [];

	return (
		<>
			<HomePage navigator={navigators.filter((nav) => nav.name == 'root')[0]} />
			<Footer />
		</>
	);
}
