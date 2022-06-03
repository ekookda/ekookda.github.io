import "./styles.css";

export default function App() {
	return (
		<>
			<Header />
			<Navbar />
			<div className="row">
				<LeftAside />
				<MainContent />
				<RightAside />
			</div>
			<Footer />
		</>
	);
}

const Header = () => {
	return (
		<div class="header">
			<h1>Header</h1>
			<p>Resize the browser window to see the responsive effect.</p>
		</div>
	);
};

const Navbar = () => {
	return (
		<div class="topnav">
			<a href="#">Link</a>
			<a href="#">Link</a>
			<a href="#">Link</a>
		</div>
	);
};

const LeftAside = () => {
	return (
		// <div class="row">
		<div class="column side">
			<h2>Side</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
		</div>
	);
};

const MainContent = () => {
	return (
		<div class="column middle">
			<h2>Main Content</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Maecenas sit amet pretium urna. Vivamus venenatis velit nec
				neque ultricies, eget elementum magna tristique. Quisque
				vehicula, risus eget aliquam placerat, purus leo tincidunt eros,
				eget luctus quam orci in velit. Praesent scelerisque tortor sed
				accumsan convallis.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				Maecenas sit amet pretium urna. Vivamus venenatis velit nec
				neque ultricies, eget elementum magna tristique. Quisque
				vehicula, risus eget aliquam placerat, purus leo tincidunt eros,
				eget luctus quam orci in velit. Praesent scelerisque tortor sed
				accumsan convallis.
			</p>
		</div>
	);
};

const RightAside = () => {
	return (
		<div class="column side">
			<h2>Side</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
		</div>
		// </div>
	);
};

const Footer = () => {
	return (
		<div class="footer">
			<p>Footer</p>
		</div>
	);
};
