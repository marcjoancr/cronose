import React from 'react';

export default function Footer() {
	return (
		<footer className='page-footer p-4'>
			<div id='footerLinks' className='row text-center'>
				<div className='col-md-6 text-md-left'>
					<p>
						<a href='#'>Home</a>
					</p>
					<p>
						<a href='#'>About Us</a>
					</p>
					<p>
						<a href='#'>How it work</a>
					</p>
					<p>
						<a href='#'>Contact</a>
					</p>
					<p>
						<a href='#'>Market</a>
					</p>
				</div>
				<div className='col-md-6 text-md-left'>
					<p>
						<a href='#'>FAQ</a>
					</p>
					<p>
						<a href='#'>Terms & Conditions</a>
					</p>
					<p>
						<a href='#'>Help & Support</a>
					</p>
					<p>
						<a href='#'>Team</a>
					</p>
				</div>
				<div id='submitFooter' className='col-md-6'>
					<form>
						<div className='form-inline justify-content-center justify-content-md-start'>
							<input
								type='email'
								className='form-control mr-sm-2'
								id='InputEmail'
								aria-describedby='emailHelp'
								placeholder='Enter email'
							/>
							<button
								type='submit'
								id='buttonSubmit'
								className='btn my-2 my-sm-0'>
								Submit
							</button>
						</div>
					</form>
				</div>
				<div id='socialLinks' className='col-md-6 text-md-left'>
					<a href='#' className='fa fa-twitter-square'></a>
					<a href='#' className='fa fa-instagram'></a>
					<a href='#' className='fa fa-twitter'></a>
				</div>
				<div className='col-12'>
					<div className='footer-copyright text-center py-3'>
						© 2020 Copyright:
						<a href=''> cronose.com</a>
					</div>
				</div>
			</div>
		</footer>
	);
}
