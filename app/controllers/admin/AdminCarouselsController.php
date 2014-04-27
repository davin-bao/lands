<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:37
 */

class AdminCarouselsController extends AdminController {

  protected $carousel;
  public function __construct(Carousel $carousel){
    $this->carousel = $carousel;
  }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function getIndex()
  {
    // Title
    $title = Lang::get('admin/carousels/title.management');

    // Grab all the users
    $carousels = Carousel::all();

    // Show the page
    return View::make('admin/carousels/index', compact('carousels', 'title'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function getCreate()
  {
    // Title
    $title = Lang::get('admin/carousels/title.create');
    // Mode
    $mode = 'create';
    // Show the page
    return View::make('admin/carousels/create_edit', compact('title', 'mode'));
  }

  public function postCreate()
  {
    $this->carousel->carousel_image = Input::get( 'carousel_image' );
      $this->carousel->carousel_content = Input::get( 'carousel_content' );
      $this->carousel->order = Input::get( 'order' );

    if ($this->carousel->save(Carousel::$rules) )
    {
      // Redirect to the new user page
      return Redirect::to('admin/carousels/' . $this->carousel->id . '/edit')->with('success', Lang::get('admin/carousels/messages.create.success'));
    }
    else
    {
      // Get validation errors (see Ardent package)
      $error = $this->carousel->errors()->all();

      return Redirect::to('admin/carousels/create')
        ->with( 'error', $error );
    }
  }
    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($carousel)
    {
        if ( $carousel->id )
        {
            // Title
            $title = Lang::get('admin/carousels/title.update');
            // mode
            $mode = 'edit';

            return View::make('admin/carousels/create_edit', compact('carousel', 'mode'));
        }
        else
        {
            return Redirect::to('admin/carousels')->with('error', Lang::get('admin/carousels/messages.does_not_exist'));
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param $carousel
     * @return Response
     */
    public function postEdit($carousel)
    {

        // Validate the inputs
        $validator = Validator::make(Input::all(), Carousel::$rules);

        // Check if the form validates with success
        if ($validator->passes())
        {

            $carousel->carousel_image = Input::get( 'carousel_image' );
            $carousel->carousel_content = Input::get( 'carousel_content' );
            $this->carousel->order = Input::get( 'order' );
            // Was the role updated?
            if ($carousel->save())
            {
                // Redirect to the role page
                return Redirect::to('admin/carousels/' . $carousel->id . '/edit')->with('success', Lang::get('admin/carousels/messages.update.success'));
            }
            else
            {
                // Redirect to the role page
                return Redirect::to('admin/carousels/' . $carousel->id . '/edit')->with('error', Lang::get('admin/carousels/messages.update.error'));
            }
        }

        // Form validation failed
        return Redirect::to('admin/carousels/' . $carousel->id . '/edit')->withInput()->withErrors($validator);
    }
    /**
     * Remove the specified user from storage.
     *
     * @param $carousel
     * @internal param $id
     * @return Response
     */
    public function postDelete($carousel)
    {
        // Was the role deleted?
        if($carousel->delete()) {
            // Redirect to the role management page
            return Redirect::to('admin/carousels')->with('success', Lang::get('admin/carousels/messages.delete.success'));
        }

        // There was a problem deleting the role
        return Redirect::to('admin/carousels')->with('error', Lang::get('admin/carousels/messages.delete.error'));
    }
}