<?php

class Pages extends Controller
{
    public function __construct()
    {
        //$this->userModel = $this->model('User');

        $this->ticketModel = $this->model('Ticket');
        $this->userModel = $this->model('User');
        $this->JazzModel = $this->model('JazzModel');
        $this->restaurantModel = $this->model('Restaurant');
        $this->ticketsModel = $this->model('RestaurantTickets');
    }

    public function index()
    {
        $restaurant = $this->restaurantModel->getAllRestaurant();
        $restaurant_type = $this->restaurantModel->getAllType();
        $data = array($restaurant, $restaurant_type);
        var_dump($data[0]);
        $this->view('pages/foodHome', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];

        $this->view('pages/about', $data);
    }

    public function foodHome()
    {
        $restaurant = $this->restaurantModel->getAllRestaurant();
        $restaurant_type = $this->restaurantModel->getAllType();
        $data = array($restaurant);
        $this->view('pages/foodHome', $data);
    }

    public function cms()
    {
        $data = [
            'title' => 'CMS',
            'events' => ($this->ticketModel->getJazzByDay("2021-07-29"/*$_POST['date']*/))
        ];

        $this->view('pages/cms', $data);
    }

    public function foodTickets($restaurant_Id)
    {
        $ticket = $this->ticketsModel->getRestaurantTickets($restaurant_Id);
        $data = array($ticket);
        $this->view('pages/foodTickets', $data);
    }
    public function orders()
    {
        $this->view('orders');
    }
    public function pdf_qrCode()
    {
        if (isset($_POST['Generate'])) {

            $name = $_POST['email'];
            $address = $_POST['Address'];
            $city = $_POST['city'];
            $zip = $_POST['zip'];

            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 14);

            $pdf->Cell(50, 10, "Firstname: ", 1, 0);
            $pdf->Cell(140, 10, $name, 1, 1);

            $pdf->Cell(50, 10, "Address: ", 1, 0);
            $pdf->Cell(140, 10, $address, 1, 1);

            $pdf->Cell(50, 10, "City: ", 1, 0);
            $pdf->Cell(140, 10, $city, 1, 1);

            $pdf->Cell(50, 10, "Zip Code: ", 1, 0);
            $pdf->Cell(140, 10, $zip, 1, 1);

            $pdf->Output();
        }
        $this->view('pdf_qrCode');
    }
    #-----------------------SAMUEL ADDED THIS-------------
    public function jazzhomepage()
    {
        $topArtists = $this->JazzModel->getTopArtists();
        $data = array($topArtists);
        var_dump($data);
        $this->view('pages/jazzhomepage', $data);
    }

    public function jazztickets()
    {
        $jazzTickets = $this->JazzModel->getAllJazzTickets();
        $data = array($jazzTickets);
        $this->view('pages/jazztickets', $data);
    }

    public function getJazzArtistsByID($id)
    {
        $ticket = $this->JazzModel->getJazzArtistsByID($id);
        $data = array($ticket);
        //$this->view('cart/cartpage', $data);
        return $data;
    }



    #-----------------------SAMUEL ADDED THIS-------------

    #-----------------------SAMUEL ADDED THIS(CART)-------------
    public function initShoppingCart($id)
    {
        if (isset($_SESSION['shopping_cart'])) {
            $item_array_ID = array_column($_SESSION['shopping_cart'], "ticketID");
            if (!in_array($id, $item_array_ID)) {
                $count = count($_SESSION['shopping_cart']);
                $data = $this->getAllTicketsToCart($id);
                $_SESSION['shopping_cart'][$count] = $data;
            } else {
                echo '<script>alert("Item has already been added")</script>';
                //redirect to jazzticket page
            }
        } else {
            $data = $this->getAllTicketsToCart($id);
            $_SESSION['shopping_cart'][0] = $data;
        }
    }


    public function getAllTicketsToCart($id)
    {
        $price = $_POST['hidden_price'];
        $name = $_POST['hidden_name'];
        $data = array("ticketID" => $id, "item_name" => $name, "item_price" => $price, "item_quantity" => $_POST['quantity']);
        return $data;
    }


    public function addTocart()
    {
        if (isset($_POST['add'])) {
            $data = $this->initShoppingCart($_POST['hidden_ID']);
        }
        $this->view('pages/cartpage', $data);
    }

    //needs fixing
    public function RemoveFromCart()
    {
        if (isset($_POST['action']) && $_POST['action'] == "delete") {
            foreach ($_SESSION['shopping_cart'] as $keys => $values) {
                if ($values["ticketID"] == $_POST['hidden_ID']) {
                    unset($_SESSION['shopping_cart'][$keys]); //$keys   
                    echo '<script>alert("Item has been deleted")</script>';
                    //redirect to cart page
                    $this->view('pages/cartpage');
                }
            }
        }
    }
    #-----------------------SAMUEL ADDED THIS(CART)-------------
}
