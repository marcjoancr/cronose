import React from 'react';
import AboutUs from './AboutUs';
import HowItWorks from './HowItWorks';
import Contact from './Contact';

export default function Home() {
	return (
		<div>
			<h1>Home</h1>
			<AboutUs />
			<HowItWorks />
			<Contact />
		</div>
	);
}
