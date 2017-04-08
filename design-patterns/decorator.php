<?php
    # decorator design pattern

    interface  CarService {
        public function getCost();
        public function getDescription();
    }

    class BasicInspection implements CarService {
        public function getCost()
        {
            return 25;
        }

        public function getDescription()
        {
            return 'Basic inspection';

        }
    }

    class OilChange implements CarService {
        protected $carService;

        function __construct(CarService $carService)
        {
            $this->carService = $carService;
        }

        public function getCost()
        {
            return 29 + $this->carService->getCost();
        }

        public function getDescription()
        {
            return $this->carService->getDescription() . ', and oil change';
        }
    }

    class TireRotation implements CarService {
        protected $carService;

        function __construct(CarService $carService)
        {
            $this->carService = $carService;
        }

        public function getCost()
        {
            return 15 + $this->carService->getCost();
        }

        public function getDescription()
        {
            return $this->carService->getDescription() . ', and a tire  rotation';
        }
    }

    // class BasicInspectionAndOilChange {
    //     public function getCost()
    //     {
    //         return 19 + 19;
    //     }
    // }

    // class BasicInspectionAndOilChangeAndTireRotatioon {
    //     public function getCost()
    //     {
    //         return 19 + 19 + 10;
    //     }
    // }

    // echo (new BasicInspectionAndOilChangeAndTireRotatioon())->getCost();
    // echo (new OilChange(new BasicInspection()))->getCost();
    // echo (new TireRotation(new OilChange(new BasicInspection())))->getCost();

    // $service = new OilChange(new TireRotation(new BasicInspection));
    // echo $service->getDescription();
    // echo $service->getCost();


    class BikeService {
        protected $cost;

        public function getCost()
        {
            return 0; # 免押金
        }

        public function setCost()
        {
            return $this->cost = $cost;
        }

        public function getDescription()
        {
            return '坑人 bike ';
        }

        public function BlueGogo()
        {
            return $this->cost +=99;
        }

        public function Mobie()
        {
            return $this->cost += 299;
        }
    }

    $bike = new BikeService();
    echo ($bike->getDescription());
    echo ($bike->BlueGogo());

