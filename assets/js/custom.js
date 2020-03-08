
function renderDropdownBox(selectedUserIdArr = []){
	$('input#Profile_ID').val(selectedUserIdArr.toString(","));
	let userListStr = $("div.list-item-container").attr("data-user-list");
	let userListArr = JSON.parse(userListStr || "");

	if(selectedUserIdArr){
		let htmlStr = "";
		for (let i=0; i < selectedUserIdArr.length; i++) {
			htmlStr +=' <div class="input-item-block"  data-id="' + userListArr[selectedUserIdArr[i] - 1].USER_ID +'" style="min-width:100px;display: flex;justify-content: space-between;" >';
			htmlStr +=' <img style="height:37px; width:37px; display: flex;border-radius: 50%;" ';
			htmlStr +='src="'+ baseUrl +'uploads/User/Image/'+ (userListArr[selectedUserIdArr[i] - 1].Image || "avater.jpg" ); 
			htmlStr +='" /><span> '+ userListArr[selectedUserIdArr[i] -1].Name +'</span>';
			htmlStr +='<span aria-hidden="true" class="select-item-close" ';
			htmlStr += ' >&times;</span> </div>';
		}
		$( "div.custom-selected-block" ).html(htmlStr);
	}
}

$(document).ready(function() {
	$('.js-Month-multiple').select2();
	$("div.custom-selected-block").on( "click", '.input-item-block', function() {
        let pointer = $(this);
        let clickedId = pointer.attr("data-id");
        let previousSelectedUserIds = ($('input#Profile_ID').val()).trim();
		let previousSelectedUserIdArr = previousSelectedUserIds && previousSelectedUserIds.split(",") || [];
		let index = previousSelectedUserIdArr.indexOf(clickedId);
		if (index > -1) {
			previousSelectedUserIdArr.splice(index, 1)
			renderDropdownBox(previousSelectedUserIdArr);
		}

    });

	$( "div.p-list-item" ).on( "click", function() {
		let clickPoint = $(this);
		let currentSelectedUserId = clickPoint.attr('data-id');
		let parentdiv = clickPoint.closest("div.list-item-container");
		let userListStr = parentdiv.attr("data-user-list");
		let userListArr = JSON.parse(userListStr || "");
		let previousSelectedUserIds = ($('input#Profile_ID').val()).trim();
		let previousSelectedUserIdArr = []
		if($("div#profileDataContainerId").attr('multiSelectAtt') == 1){
			previousSelectedUserIdArr = previousSelectedUserIds && previousSelectedUserIds.split(",") || [];
		}
		if(!previousSelectedUserIdArr.includes(currentSelectedUserId)){
			previousSelectedUserIdArr.push(currentSelectedUserId);
		}

		if(previousSelectedUserIdArr.length){
			renderDropdownBox(previousSelectedUserIdArr);
		}
		parentdiv.removeClass("show");

	});
});

$( "div.custom-input" ).on( "click", function() {
	$(this).siblings().addClass("show");
});

$(document).click(function(event) { 
  $target = $(event.target);
  if(!$target.closest('div.custom-input').length) {
	$("div.list-item-container").removeClass("show");
  }        
});
