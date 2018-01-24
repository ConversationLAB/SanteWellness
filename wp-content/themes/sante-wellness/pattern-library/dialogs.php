<!-- Dialogs
================================================== -->
<div class="bs-docs-section">

	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1 id="dialogs">Dialogs</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<h2>Modals</h2>

			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
				Launch demo modal
			</button>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="btn-close-modal btn btn-danger" data-dismiss="modal" aria-hidden="true">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">Example Modal</h4>
						</div>
						<div class="modal-body">
							<p>This is the modal content</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">
								<i class="fa fa-times" aria-hidden="true"></i> Close
							</button>
							<button type="button" class="btn btn-primary"> 
								<i class="fa fa-floppy-o" aria-hidden="true"></i> Save changes
							</button>
						</div>			
					</div>
				</div>
			</div>


		</div>
		<div class="col-lg-6">
			<h2>Popovers</h2>
			<div class="bs-component">
				<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Left</button>

				<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Top</button>

				<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
		sagittis lacus vel augue laoreet rutrum faucibus.">Bottom</button>

				<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Right</button>
			</div>
			<h2>Tooltips</h2>
			<div class="bs-component">
				<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tooltip on left">Left</button>

				<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">Top</button>

				<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tooltip on bottom">Bottom</button>

				<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="" data-original-title="Tooltip on right">Right</button>
			</div>
		</div>
	</div>
</div>