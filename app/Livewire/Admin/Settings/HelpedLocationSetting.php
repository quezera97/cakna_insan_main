<?php

namespace App\Livewire\Admin\Settings;

use App\Models\LocationCoordinate;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class HelpedLocationSetting extends Component
{
    use WithPagination;

    public $locationCoordinate;
    public $selectedLocation;
    public $longitude;
    public $latitude;
    public $place_or_country;
    public $date;

    public $showAlertModal = false;

    public $alertModalType = '';
    public $alertModalDescription = '';


    public function openAlertModal()
    {
        $this->showAlertModal = true;
    }

    public function closeAlertModal()
    {
        $this->showAlertModal = false;
    }


    public $showConfirmationModal = false;

    public $functionPassed;
    public $paramPassed;

    public $confirmationModalTitle = '';

    public function openConfirmationModal($function, $param)
    {
        $this->functionPassed = $function;
        $this->paramPassed = $param;

        $this->confirmationModalTitle = 'Are you sure?';

        $this->showConfirmationModal = true;
    }

    public function closeConfirmationModal()
    {
        $this->showConfirmationModal = false;
    }

    public function acceptConfirmationModal()
    {
        if (method_exists($this, $this->functionPassed)) {
            call_user_func_array([$this, $this->functionPassed], [$this->paramPassed]);
        }

        $this->showConfirmationModal = false;
    }

    public function locationCoordinateRender()
    {
        return LocationCoordinate::paginate(5);
    }

    public function render()
    {
        return view('livewire.admin.settings.helped-location-setting', [
            'paginatedLocationCoordinate' => $this->locationCoordinateRender()
        ]);
    }

    public $addHelpedLocationModal = false;

    public function openHelpedLocationModal()
    {
        $this->longitude = null;
        $this->latitude = null;
        $this->place_or_country = null;
        $this->date = null;

        $this->addHelpedLocationModal = true;
    }

    public function closeHelpedLocationModal()
    {
        $this->addHelpedLocationModal = false;
    }

    public $editHelpedLocationModal = false;

    public function openEditHelpedLocationsModal($locationCoordinateId)
    {
        $this->selectedLocation = LocationCoordinate::find($locationCoordinateId);

        $this->longitude = $this->selectedLocation->longitude;
        $this->latitude = $this->selectedLocation->latitude;
        $this->place_or_country = $this->selectedLocation->place_or_country;
        $this->date = $this->selectedLocation->date;

        $this->editHelpedLocationModal = true;
    }

    public function closeEditHelpedLocationsModal()
    {
        $this->editHelpedLocationModal = false;
    }

    public function save()
    {
        $this->validate([
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'place_or_country' => 'required|string',
            'date' => 'required|string',
        ],[],[
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'place_or_country' => __('ui_text.place'),
            'date' => __('ui_text.date'),
        ]);

        try {
            DB::beginTransaction();

            LocationCoordinate::create([
                'longitude' => $this->longitude,
                'latitude' => $this->latitude,
                'place_or_country' => $this->place_or_country,
                'date' => $this->date,
            ]);

            DB::commit();

            return redirect()->route('helped-location-settings');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function edit()
    {
        $this->validate([
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'place_or_country' => 'required|string',
            'date' => 'required|string',
        ],[],[
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'place_or_country' => __('ui_text.place'),
            'date' => __('ui_text.date'),
        ]);

        try {
            DB::beginTransaction();

            $this->selectedLocation->update([
                'longitude' => $this->longitude,
                'latitude' => $this->latitude,
                'place_or_country' => $this->place_or_country,
                'date' => $this->date,
            ]);

            DB::commit();

            $this->alertModalType = 'success';
            $this->alertModalDescription = 'Location has been saved';

            $this->openAlertModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function deleteHelpedLocation($locationCoordinateId)
    {
        $locationCoordinate = LocationCoordinate::find($locationCoordinateId);

        try {
            DB::beginTransaction();

            $locationCoordinate->delete();

            DB::commit();

            return redirect()->route('helped-location-settings');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
