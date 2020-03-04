import React from 'react';

export default function Chat() {
	return (
		<>
			<h1 className='text-center mt-4'>Chat</h1>
			<div className='container-fluid '>
				<div className='row card-chat'>
					<div className='chats col-3 p-1'>
						<div className='bg'>
							<div className='user-chat p-1'>
								<div className='row p-2'>
									<img
										className='pr-2'
										src='/assets/img/avatar-placeholder.png'
										height='55px'
									/>
									<div className='row'>
										<div className='col-12'>Username</div>
										<small>Lorem ipsum sdklj klsafl klsfdkjl...</small>
									</div>
								</div>
							</div>
							<div className='user-chat p-1'>
								<div className='row p-2'>
									<img
										className='pr-2'
										src='/assets/img/avatar-placeholder.png'
										height='55px'
									/>
									<div className='row'>
										<div className='col-12'>Username</div>
										<small>Lorem ipsum sdklj klsafl klsfdkjl...</small>
									</div>
								</div>
							</div>
							<div className='user-chat p-1'>
								<div className='row p-2'>
									<img
										className='pr-2'
										src='/assets/img/avatar-placeholder.png'
										height='55px'
									/>
									<div className='row'>
										<div className='col-12'>Username</div>
										<small>Lorem ipsum sdklj klsafl klsfdkjl...</small>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div className='chat col-6 p-1'>
						<div className='messages mb-2'>
							<div className='user p-2'>
								<img
									className='pr-2'
									src='/assets/img/avatar-placeholder.png'
									height='40px'
								/>
								Username
							</div>
						</div>

						<div className='row'>
							<div className='pr-1 col-10'>
								<input
									className='form-control'
									type='text'
									placeholder='Insert message here!'
									readonly
								/>
							</div>
							<div className='pl-1 col-2'>
								<input className='btn w-100' type='submit' value='Submit' />
							</div>
						</div>
					</div>
					<div className='col-3 p-2 bg-success'>Cards</div>
				</div>
			</div>
		</>
	);
}
