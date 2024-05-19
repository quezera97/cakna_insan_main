<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Statistic;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StatisticsSetting extends Component
{
    public $title;
    public $details;
    public $statistic_1;
    public $statistic_2;
    public $statistic_3;
    public $statistic_4;
    public $statistic_1_value;
    public $statistic_2_value;
    public $statistic_3_value;
    public $statistic_4_value;

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

    public function mount()
    {
        $statistics = Statistic::first();

        if(!is_null($statistics)){
            $this->title = $statistics->title;
            $this->details = $statistics->details;
            $this->statistic_1 = $statistics->statistic_1;
            $this->statistic_2 = $statistics->statistic_2;
            $this->statistic_3 = $statistics->statistic_3;
            $this->statistic_4 = $statistics->statistic_4;
            $this->statistic_1_value = $statistics->statistic_1_value;
            $this->statistic_2_value = $statistics->statistic_2_value;
            $this->statistic_3_value = $statistics->statistic_3_value;
            $this->statistic_4_value = $statistics->statistic_4_value;
        }
    }

    public function render()
    {
        return view('livewire.admin.settings.statistics-setting');
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string',
            'details' => 'required|string',
            'statistic_1' => 'required|string',
            'statistic_2' => 'required|string',
            'statistic_3' => 'required|string',
            'statistic_4' => 'required|string',
            'statistic_1_value' => 'required|string',
            'statistic_2_value' => 'required|string',
            'statistic_3_value' => 'required|string',
            'statistic_4_value' => 'required|string',
        ],[],[
            'title' => __('ui_text.title'),
            'details' => __('ui_text.details'),
            'statistic_1' => __('ui_text.statistics').' 1',
            'statistic_2' => __('ui_text.statistics').' 2',
            'statistic_3' => __('ui_text.statistics').' 3',
            'statistic_4' => __('ui_text.statistics').' 4',
            'statistic_1_value' => __('ui_text.statistics_value').' 1',
            'statistic_2_value' => __('ui_text.statistics_value').' 2',
            'statistic_3_value' => __('ui_text.statistics_value').' 3',
            'statistic_4_value' => __('ui_text.statistics_value').' 4',
        ]);

        try {
            DB::beginTransaction();

            $statistics = Statistic::first();

            if(is_null($statistics)){
                Statistic::create([
                    'title' => $this->title,
                    'details' => $this->details,
                    'statistic_1' => $this->statistic_1,
                    'statistic_2' => $this->statistic_2,
                    'statistic_3' => $this->statistic_3,
                    'statistic_4' => $this->statistic_4,
                    'statistic_1_value' => $this->statistic_1_value,
                    'statistic_2_value' => $this->statistic_2_value,
                    'statistic_3_value' => $this->statistic_3_value,
                    'statistic_4_value' => $this->statistic_4_value,
                ]);

                DB::commit();

                return redirect()->route('statistics-settings');
            }
            else{
                $statistics->update([
                    'title' => $this->title,
                    'details' => $this->details,
                    'statistic_1' => $this->statistic_1,
                    'statistic_2' => $this->statistic_2,
                    'statistic_3' => $this->statistic_3,
                    'statistic_4' => $this->statistic_4,
                    'statistic_1_value' => $this->statistic_1_value,
                    'statistic_2_value' => $this->statistic_2_value,
                    'statistic_3_value' => $this->statistic_3_value,
                    'statistic_4_value' => $this->statistic_4_value,
                ]);

                DB::commit();

                $this->alertModalType = 'success';
                $this->alertModalDescription = 'Statistics has been saved';

                $this->openAlertModal();
            }

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
