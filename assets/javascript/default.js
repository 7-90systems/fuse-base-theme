jQuery (document).ready (function () {
    
    // Set up our menus.
    fuseBaseSetupMenus ();
    
});




/**
 *	Set up the menus.
 */
function fuseBaseSetupMenus () {
	// Desktop
	jQuery ('.sf-menu').superfish ({
		cssArrows: false
	});
	
	// Mobile
	var menu = new MmenuLight (document.querySelector ('#mobile_menu'), 'all');
	var navigator = menu.navigation ();
	var drawer = menu.offcanvas ();
	
	//	Open the menu.
	document.querySelector ('#menu-toggle')
		.addEventListener ('click', (evnt) => {
			evnt.preventDefault ();
			drawer.open ();
		}
	);
} // kssSetupMenus ()