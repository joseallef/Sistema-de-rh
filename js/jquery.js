

$(function(){

	$(document).ready(function(){

		var s = $(".selecionar");
			
			s.hide("hide");

			$('#opcoes').change(function(){
			if($(this).val() === "T"){
				$('.todos').show();
				$('.selecionar').hide();
		
			}else
			 if($(this).val() === "S"){
				$('.selecionar').show("show");
				$('.todos').hide("hide");
				
			}

		});

		$(".imput").each(function(){
			var place = $(this).attr("title");
			var input = $(this);

			input
				.val(place)
				.css('color','#888')
				.focusin(function(){
					input.css("color", "#000");
					if (input.val() == place){
						input.val('');
					}
				}).focusout(function(){
					if (input.val() == ''){
						input.css('color', '#999');
						input.val(place);
					}
				});

		});


	});

		var dem = $("#demitir");
		let op = $(".op1");
		let op2;
			
			op.hide();
			$('.op2').show();

			$('#demitir').click(function(){
				$(op).show();
				$('.op2').hide();
			})
			$('#demitidos').click(function(){
				$(op).hide();
				$('.op2').show();
			});

	   // $(document).ready(function () { 
    //     var $seuCampoCpf = $("#CPF");
    //     $seuCampoCpf.mask('000.000.000-00', {reverse: true});
    // });

});

let inp = document.querySelector(".not");
inp.style.color = "yellow";