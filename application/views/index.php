<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<title>Book</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<h1 class="text-center">Book List</h1>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-sm-12" id="message2"></div>
			<div class="col-sm-12" style="padding-bottom: 5px;">
				<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#createModel">
					<span class="glyphicon glyphicon-plus"></span>&emsp;Create Book
				</button>
			</div>
		</div>
		<table class="table table-striped" style="border: 1px solid black;">
			<thead>
				<tr>
					<th>Book Title</th>
					<th>Author</th>
					<th>Date Created</th>
					<th>Date Updated</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody id="tableBody">
				<?php foreach($books as $book): ?>
					<tr id="book_<?= $book->id ?>">
						<td class="book_title"><?= $book->title ?></td>
						<td class="book_author"><?= $book->author ?></td>
						<td class="date_created"><?= $book->date_created ?></td>
						<td class="date_updated"><?= $book->date_updated ?></td>
						<td>
							<button class="btn btn-primary edit_book" data-id="<?= $book->id ?>" data-toggle='modal' data-target='#editModel'><i class="glyphicon glyphicon-pencil"></i></button>
							<button class="btn btn-danger delete_book" data-id="<?= $book->id ?>" data-toggle="modal" data-target="#deleteModel"><i class="glyphicon glyphicon-trash"></i></button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="col-xs-12 text-center h3" id="table_status"><?= count($books) > 0 ? '' : 'No Books' ?></div>
	</div>

<!-- Create Book Modal -->
<div class="modal fade" id="createModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">
					Create Book
				</h4>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
				<form role="form" id="bookForm" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Task Name"/>
					</div>
					<div class="form-group">
						<label for="author">Author</label>
						<input class="form-control" id="author" name="author" placeholder="Author Name" />
					</div>
					<!--<div class="form-group">
						<label for="cover">Book Cover</label>
						<input type="file" class="form-control" id="cover" name="cover" placeholder="Cover Upload" />
					</div>-->
				</form>
				<div id="message1">
				</div>
			</div>
			<!-- Modal Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Close
				</button>
				<button type="button" id="create_book" class="btn btn-success">
					Create Book
				</button>
			</div>
		</div>
	</div>
</div>	

<!-- Edit Book Modal -->
<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">
					Edit Book
				</h4>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
				<form role="form" id="editBookForm">
					<div class="form-group">
						<label for="title">Name</label>
						<input type="text" class="form-control" id="m_book_title" name="title" placeholder="Book Title"/>
					</div>
					<div class="form-group">
						<label for="author">Author</label>
						<input class="form-control" id="m_book_author" name="author" placeholder="Book Author" />
					</div>
					<input type="hidden" id="m_book_id" name="book_id">
				</form>
				<div id="message1">
				</div>
			</div>
			<!-- Modal Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Close
				</button>
				<button type="button" id="update_book" class="btn btn-success">
					Update Book
				</button>
			</div>
		</div>
	</div>
</div>

<!-- Delete Book Modal -->
<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">
					Create Book
				</h4>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
				<p>Are you sure you want to delete the selected Book?</p>
			</div>
			<!-- Modal Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cancel
				</button>
				<button type="button" id="del_btn" class="btn btn-danger">
					Delete
				</button>
			</div>
		</div>
	</div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>

	$(function(){

		/* The following function inserts a new book on click */
		$('#create_book').on('click', function(e){
			e.preventDefault();

			var formData = $("#bookForm").serialize();
			/*var formData = new FormData();
			var imgFile = $("#cover")[0]; // change your delector here
			formData.append("data", $("#bookForm").serialize());
			formData.append("cover_photo", imgFile.files[0]);*/ // change filename field here
			$.ajax({
				type: 'post',
				url: 'crud/create_book',
				data: formData
			}).then(function(res){
				if(res.type == 'success'){
					appendRow(res.message);
					$("#message2").html("<div class='alert alert-success' id='success-alert'>Book "+res.message.title+" created Successfully!</div>");
					$("#bookForm").get(0).reset();
					$('#createModel').modal('toggle');
					hideAlert("#success-alert");
				} else{
					$("#message1").html("<div class='alert alert-danger'>"+res.message+"</div>");
				}
			}, function(){
				alert('Sorry! Some Error Occured');
			});

			//uploadImage();
		});

		$('#tableBody').on('click', '.edit_book', function(e){
			e.preventDefault();
			var rowId = $(this).attr('data-id');
			var title = $('#book_'+rowId).find('.book_title').text();
			var author = $('#book_'+rowId).find('.book_author').text();
			$("#editBookForm").find('#m_book_id').val(rowId);
			$("#editBookForm").find('#m_book_title').val(title);
			$("#editBookForm").find('#m_book_author').val(author);
		});

		/* The following function Updates the Selected book */
		$('#update_book').on('click', function(e){
			e.preventDefault();
			var formData = $("#editBookForm").serialize();
			$.ajax({
				type: 'post',
				url: 'crud/update_book',
				data: formData
			}).then(function(res){
				if(res.type == 'success'){
					updateRow(res.message);
					$("#message2").html("<div class='alert alert-success' id='success-alert'>Book "+res.message.title+" updated Successfully!</div>");
					$("#editBookForm").get(0).reset();
					$('#editModel').modal('toggle');
					hideAlert("#success-alert");
				} else{
					$("#message1").html("<div class='alert alert-danger'>"+res.message+"</div>");
				}
			}, function(){
				alert('Sorry! Some Error Occured');
			})
		});



		$('#tableBody').on('click', '.delete_book', function(e){
			e.preventDefault();
			var id = $(this).data('id');
			$('#deleteModel #del_btn').data('id', id);
		});

		$('#del_btn').click(function(e){
			e.preventDefault();
			var id = $(this).data('id');
			$('#deleteModel').modal('toggle');
			$.ajax({
				type: 'post',
				url: 'crud/delete_book',
				data: {'id': id}
			}).then(function(res){
				if(res.type == 'success'){
					$("#message2").html("<div class='alert alert-success' id='success-alert'>Book deleted Successfully!</div>");
						$('#book_'+id).remove();
					hideAlert("#success-alert");
				} else{
					$("#message2").html("<div class='alert alert-danger' id='success-alert'>Cannot Delete the Book!</div>");
					hideAlert("#success-alert");
				}
			}, function(){
				alert('Sorry! Some Error Occured');
			})
		});
		
		function appendRow(message){
			$('#tableBody').append([
				"<tr id='book_"+message.id+"'>",
					"<td class='book_title'>"+message.title+"</td>",
					"<td class='book_author'>"+message.author+"</td>",
					"<td class='date_created'>"+message.date_created+"</td>",
					"<td class='date_updated'>"+message.date_updated+"</td>",
					"<td>",
					"<button class='btn btn-primary edit_book' data-id='"+message.id+"' data-toggle='modal' data-target='#editModel'><i class='glyphicon glyphicon-pencil'></i></button>&nbsp;",
					"<button class='btn btn-danger delete_book' data-id='"+message.id+"' data-toggle='modal' data-target='#deleteModel'><i class='glyphicon glyphicon-trash'></i></button>",
					"</td>",
				"</tr>"].join('')
			);
		}

		function updateRow(message){
			var row = $('#tableBody').find('#book_' + message.id);
			row.find('.book_title').text(message.title);
			row.find('.book_author').text(message.author);
			row.find('.date_created').text(message.date_created);
			row.find('.date_updated').text(message.date_updated);
		}

		function hideAlert(id){
				$(id).fadeTo(2000, 500).slideUp(500, function(){
					$(id).slideUp(500);
				});
		}

		$('#tableBody').bind('DOMSubtreeModified', function(e) {
		  if ($("#tableBody > tr").length > 0) {
		  	$("#table_status").text('');
		  } else{
		    $("#table_status").text('No Tasks');
		  }
		});

		function uploadImage() {

		}


	});

</script>
</body>
</html>
