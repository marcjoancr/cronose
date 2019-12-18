create database if not exists `Cronose`;
use `Cronose`;
set sql_mode = 'allow_invalid_dates';

create table if not exists Language (
    id int auto_increment primary key not null
);

create table if not exists Language_Translation (
    language_id int not null,
    language_translated int not null,
    translation varchar(25) not null,
    foreign key (language_id) references Language(id),
    foreign key (language_translated) references Language(id)
);

create table if not exists Province (
    id int auto_increment primary key not null,
    name varchar(25) not null
);

create table if not exists City (
    cp int not null unique,
    province_id int not null,
    name varchar(25) not null,
    longitude double(13,3) not null,
    latitude double(13,3) not null,
    foreign key (province_id) references Province(id),
    primary key(cp, province_id)
);

create table if not exists Company (
    id int auto_increment primary key not null,
    name varchar(85) not null,
    phone varchar(50),
    email varchar(100),
    website varchar(255)
);

create table if not exists Category (
    id int auto_increment primary key not null,
    coin_price int not null
);

create table if not exists Category_Language (
    language_id int not null,
    category_id int not null,
    name varchar(45) not null,
    foreign key (language_id) references Language(id),
    foreign key (category_id) references Category(id),
    primary key(language_id, category_id)
);

create table if not exists Specialization (
    id int auto_increment primary key not null,
    category_id int not null,
    foreign key (category_id) references Category(id)
);

create table if not exists Specialization_Language (
    language_id int not null,
    specialization_id int not null,
    name varchar(65) not null,
    foreign key (language_id) references Language(id),
    foreign key (specialization_id) references Specialization(id),
    primary key(language_id, specialization_id)
);

create table if not exists Cancelation_Policy (
    id int auto_increment primary key not null
);

create table if not exists Cancelation_Language (
    language_id int not null,
    cancelation_policy_id int not null,
    name varchar(25) not null,
    description varchar(255) not null,
    foreign key (language_id) references Language(id),
    foreign key (cancelation_policy_id) references Cancelation_Policy(id),
    primary key(language_id, cancelation_policy_id)
);

create table if not exists Cancelation_Section (
    id int auto_increment primary key not null,
    cancelation_compensation double(2, 2) not null,
    cancelation_zone double(2, 2) not null
);

create table if not exists Cancelation_Integrates_Section (
    cancelation_policy_id int not null,
    cancelation_section_id int not null,
    foreign key (cancelation_policy_id) references Cancelation_Policy(id),
    foreign key (cancelation_section_id) references Cancelation_Section(id),
    primary key(cancelation_policy_id, cancelation_section_id)
);

create table if not exists Media (
    id int auto_increment primary key not null,
    extension varchar(8) not null,
    url varchar(255) not null
);

create table if not exists DNI_Photo (
    id int auto_increment primary key not null,
    status enum('accepted', 'pending', 'rejected') default 'pending' not null,
    media_id int not null,
    foreign key (media_id) references Media(id)
);

create table if not exists User (
    dni varchar(9) primary key not null,
    name varchar(45) not null,
    surname varchar(45) not null,
    surname_2 varchar(45),
    email varchar(32) not null,
    password varchar(255) not null,
    tag int(4) not null,
    coins double(3,2) default '0.00' not null,
    registration_date date not null,
    points int default 0 not null,
    private boolean default false not null,
    city_cp int not null,
    province_id int not null,
    avatar_id int,
    dni_photo_id int not null,
    foreign key (city_cp) references City(cp),
    foreign key (province_id) references Province(id),
    foreign key (avatar_id) references Media(id),
    foreign key (dni_photo_id) references DNI_Photo(id)
);

create table if not exists User_Language (
    language_id int not null,
    user_id varchar(9) not null,
    foreign key (language_id) references Language(id),
    foreign key (user_id) references User(dni),
    primary key(language_id, user_id)
);

create table if not exists Blocks (
    user_blocker_id varchar(9) not null,
    user_blocked_id varchar(9) not null,
    foreign key (user_blocker_id) references User(dni),
    foreign key (user_blocked_id) references User(dni),
    primary key(user_blocker_id, user_blocked_id)
);

create table if not exists Message (
    sender_id varchar(9) not null,
    receiver_id varchar(9) not null,
    sended_date timestamp not null unique,
    foreign key (sender_id) references User(dni),
    foreign key (receiver_id) references User(dni),
    primary key(sender_id, receiver_id, sended_date)
);

create table if not exists Advertisement (
    company_id int not null,
    specialization_id int not null,
    foreign key (company_id) references Company(id),
    foreign key (specialization_id) references Specialization(id),
    primary key (company_id, specialization_id)
);

create table if not exists Advertisement_Language (
    language_id int not null,
    company_id int not null,
    specialization_id int not null,
    title varchar(155) not null,
    description varchar(255),
    foreign key (language_id) references Language(id),
    foreign key (company_id) references Advertisement(company_id),
    foreign key (specialization_id) references Advertisement(specialization_id),
    primary key(language_id, company_id, specialization_id)
);

create table if not exists Published (
    starting_date timestamp not null unique,
    company_id int not null,
    specialization_id int not null,
    ending_date date,
    foreign key (company_id) references Company(id),
    foreign key (specialization_id) references Specialization(id),
    primary key (starting_date, company_id, specialization_id)
);

create table if not exists Published_In_City (
    city_cp int not null,
    starting_date timestamp not null unique,
    company_id int not null,
    specialization_id int not null,
    foreign key (company_id) references Company(id),
    foreign key (specialization_id) references Specialization(id),
    foreign key (city_cp) references City(cp),
    primary key (city_cp, starting_date, company_id, specialization_id)
);

create table if not exists Illustrates (
    media_id int,
    company_id int not null,
    specialization_id int not null,
    foreign key (media_id) references Media(id),
    foreign key (company_id) references Company(id),
    foreign key (specialization_id) references Specialization(id),
    primary key (media_id, company_id, specialization_id)
);

create table if not exists Archievments (
    id int not null auto_increment primary key,
    name varchar(45) not null,
    description varchar(255) not null
);

create table if not exists Archievments_Language (
    language_id int not null,
    archievment_id int not null,
    name varchar(45) not null,
    description varchar(255) not null,
    foreign key (language_id) references Language(id),
    foreign key (archievment_id) references Archievments(id),
    primary key(language_id, archievment_id)
);

create table if not exists Obtain (
    archievments_id int not null auto_increment primary key,
    user_dni varchar(9) not null,
    obtained_at date not null,
    foreign key (archievments_id) references Archievments(id),
    foreign key (user_dni) references User(dni)
);

create table if not exists Veteranity (
    level int not null primary key,
    points int not null,
    debt_quantity int not null
);

create table if not exists Veteranity_Language(
    language_id int not null,
    level_id int not null,
    name varchar(45) not null,
    foreign key (language_id) references Language(id),
    foreign key (level_id) references Veteranity(level),
    primary key(language_id, level_id)
);

create table if not exists Change_Veteranity (
    veteranity_level int not null,
    user_dni varchar(9) not null,
    changed_at date not null,
    foreign key (veteranity_level) references Veteranity(level),
    foreign key (user_dni) references User(dni),
    primary key (veteranity_level, user_dni)
);

create table if not exists Offer (
    user_dni varchar(9) not null,
    specialization_id int not null,
    valoration_avg double(2,2) default 0 not null,
    personal_valoration double(2,2) default 0 not null,
    coin_price double(2,2) not null,
    offered_at date not null,
    visibility boolean default true not null,
    foreign key (user_dni) references User(dni),
    foreign key (specialization_id) references Specialization(id),
    primary key (user_dni, specialization_id)
);

create table if not exists Offer_Language(
    language_id int not null,
    user_dni varchar(9) not null,
    specialization_id int not null,
    title varchar(45) not null,
    description varchar(255) not null,
    foreign key (language_id) references Language(id),
    foreign key (user_dni) references Offer(user_dni),
    foreign key (specialization_id) references Offer(specialization_id),
    primary key(language_id, user_dni)
);

create table if not exists Promotes (
    user_dni varchar(9) not null,
    specialization_id int not null,
    starting_date timestamp not null unique,
    ending_date datetime,
    foreign key (user_dni) references User(dni),
    foreign key (specialization_id) references Specialization(id),
    primary key (user_dni, specialization_id, starting_date)
);

create table if not exists Load_Media (
    user_dni varchar(9) not null,
    specialization_id int not null,
    media_id int not null,
    foreign key (user_dni) references User(dni),
    foreign key (specialization_id) references Specialization(id),
    foreign key (media_id) references Media(id),
    primary key (user_dni, specialization_id, media_id)
);

create table if not exists QR_Code (
    id int auto_increment primary key not null,
    url varchar(255) not null,
    status enum('pending','accepted','done') default 'pending' not null
);

create table if not exists Demands (
    client_dni varchar(9) not null,
    worker_dni varchar(9) not null,
    specialization_id int not null,
    demanded_at timestamp not null unique,
    foreign key (client_dni) references User(dni),
    foreign key (worker_dni) references Offer(user_dni),
    foreign key (specialization_id) references Offer(specialization_id),
    primary key (client_dni, worker_dni, specialization_id, demanded_at)
);


create table if not exists Card (
    id int auto_increment primary key not null,
    status enum('pending','accepted','done','rejected') default 'pending' not null,
    work_date datetime not null,
    qr_code_id int,
    cancelation_policy_id int not null,
    client_dni varchar(9) not null,
    worker_dni varchar(9) not null,
    specialization_id int not null,
    demand_date timestamp not null unique,
    foreign key (qr_code_id) references QR_Code(id),
    foreign key (cancelation_policy_id) references Cancelation_Policy(id),
    foreign key (client_dni) references Demands(client_dni),
    foreign key (worker_dni) references Demands(worker_dni),
    foreign key (specialization_id) references Demands(specialization_id),
    foreign key (demand_date) references Demands(demanded_at)
);


create table if not exists Auction (
    user_dni varchar(9) not null,
    specialization_id int not null,
    auctioned_at timestamp not null unique,
    valoration_avg double(2,2) default 0 not null,
    personal_valoration double(2,2) default 0 not null,
    start_coin_price double(2,2) not null,
    work_date date not null,
    cancelation_policy_id int not null,
    card_id int not null,
    foreign key (user_dni) references User(dni),
    foreign key (specialization_id) references Specialization(id),
    foreign key (cancelation_policy_id) references Cancelation_Policy(id),
    foreign key (card_id) references Card(id),
    primary key (user_dni, specialization_id, auctioned_at)
);

create table if not exists Auction_Language (
    language_id int not null,
    user_dni varchar(9) not null,
    specialization_id int not null,
    auctioned_at timestamp not null unique,
    title varchar(45) not null,
    description varchar(255) not null,
    foreign key (language_id) references Language(id),
    foreign key (user_dni) references Auction(user_dni),
    foreign key (specialization_id) references Auction(specialization_id),
    foreign key (auctioned_at) references Auction(auctioned_at),
    primary key(language_id, user_dni, specialization_id, auctioned_at)
);

create table if not exists Pushes (
    coin_pushed double(3,2) not null,
    date_pushed timestamp not null unique,
    pusher_id varchar(9) not null,
    user_dni varchar(9) not null,
    specialization_id int not null,
    auction_date timestamp not null unique,
    foreign key (pusher_id) references User(dni),
    foreign key (user_dni) references Auction(user_dni),
    foreign key (specialization_id) references Auction(specialization_id),
    foreign key (auction_date) references Auction(auctioned_at),
    primary key(pusher_id, user_dni, specialization_id, auction_date, date_pushed)
);

create table if not exists Valoration_Label (
    id int auto_increment primary key not null
);

create table if not exists Valoration_Label_Language(
    language_id int not null,
    valoration_label_id int not null,
    aspect varchar(45) not null,
    foreign key (language_id) references Language(id),
    foreign key (valoration_label_id) references Valoration_Label(id),
    primary key(language_id, valoration_label_id)
);

create table if not exists Comment (
    id int auto_increment primary key not null
);

create table if not exists Comment_Language(
    language_id int not null,
    comment_id int not null,
    text varchar(255) not null,
    foreign key (language_id) references Language(id),
    foreign key (comment_id) references Comment(id),
    primary key(language_id, comment_id)
);

create table if not exists Worker_Valoration (
    valoration_id int not null,
    card_id int not null,
    comment_id int null,
    puntuation int not null,
    foreign key (valoration_id) references Valoration_Label(id),
    foreign key (card_id) references Card(id),
    foreign key (comment_id) references Comment(id),
    primary key (valoration_id, card_id)
);

create table if not exists Client_Valoration (
    valoration_id int not null,
    card_id int not null,
    comment_id int null,
    puntuation int not null,
    foreign key (valoration_id) references Valoration_Label(id),
    foreign key (card_id) references Card(id),
    foreign key (comment_id) references Comment(id),
    primary key (valoration_id,card_id)
);
