function verifPasswd(f) {
var pass1=f.newuserpasswd1.value;
var pass2=f.newuserpasswd2.value;
if ( pass1==pass2 )
{
	showHint('passwd_match_msg');
} else {
    hideHint('passwd_match_msg');
}
}

(function($){

var passwordStrength = new function()
{
	this.countRegexp = function(val, rex)
	{
		var match = val.match(rex);
		return match ? match.length : 0;
	}
	
	this.getStrength = function(val, minLength)
	{	
		var len = val.length;
		
		// too short =(
		if (len < minLength)
		{
			return 0;
		}
		
		var nums = this.countRegexp(val, /\d/g),
			lowers = this.countRegexp(val, /[a-z]/g),
			uppers = this.countRegexp(val, /[A-Z]/g),
			specials = len - nums - lowers - uppers;
		
		// just one type of characters =(
		if (nums == len || lowers == len || uppers == len || specials == len)
		{
			return 1;
		}
		
		var strength = 0;
		if (nums)	{ strength+= 2; }
		if (lowers)	{ strength+= uppers? 4 : 3; }
		if (uppers)	{ strength+= lowers? 4 : 3; }
		if (specials) { strength+= 5; }
		if (len > 10) { strength+= 1; }
		
		return strength;
	}
	
	this.getStrengthLevel = function(val, minLength)
	{
		var strength = this.getStrength(val, minLength);
		switch (true)
		{
			case (strength <= 0):
				return 1;
				break;
			case (strength > 0 && strength <= 4):
				return 2;
				break;
			case (strength > 4 && strength <= 8):
				return 3;
				break;
			case (strength > 8 && strength <= 12):
				return 4;
				break;
			case (strength > 12):
				return 5;
				break;
		}
		
		return 1;
	}
}

$.fn.password_strength = function(options)
{
	/* qsun extended
	   - call checkValidation every time key pressed
	   - if invalid, display invalid message (in red color)
	   - otherwise, switch back to black color
	   */
	var settings = $.extend({
		'checkValidation' : null,
		'invalidMessage' : '',
		'container' : null,
		'minLength' : 6,
		'texts' : {
			1 : 'Too weak. Try using numbers and letters.',
			2 : 'Weak password',
			3 : 'Normal strength',
			4 : 'Strong password',
			5 : 'Very strong password'
		}
	}, options);
	
	return this.each(function()
	{
		if (settings.container)
		{
			var container = $(settings.container);
		}
		else
		{
			var container = $('<span/>').attr('class', 'password_strength');
			$(this).after(container);
		}
		
		$(this).keyup(function()
		{
			var val = $(this).val();
			if (val.length > 0)
			{
				var level = passwordStrength.getStrengthLevel(val, settings.minLength);
				var _class = 'password_strength_' + level;
				
				if (!container.hasClass(_class) && level in settings.texts)
				{
					container.text(settings.texts[level]).attr('class', 'password_strength ' + _class);
				}

				container.css('color', '#000000');
				
				if (typeof settings.checkValidation != 'undefined') {
					if (!settings.checkValidation()) {
						container.text(settings.invalidMessage).attr('class', 'password_stringth').css('color', 'red');
					}
				}
			}
			else
			{
				container.text('').attr('class', 'password_strength');
			}
		});
	});
};

})(jQuery);
// JavaScript Document