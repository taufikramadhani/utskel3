<?php

namespace App\Controllers;

use App\Models\registerpesertaModel;
use CodeIgniter\HTTP\Request;

class Pages extends BaseController
{
    protected $registerModel;
    public function home()
    {
        $data=[
            'title' => 'Home | WEB Event Organizer'
            
            
        ];
        echo view ('layout/header',$data);
        echo view ('pages/home');
        echo view ('layout/footer');
    }


    public function event()
    {
    
        $data=[
            'title' => 'Event | WEB Event Organizer', 
        ];

        echo view ('layout/header',$data);
        echo view ('pages/event');
        echo view ('layout/footer');

    }


    
    public function register()
    {
        $registerpeserta= $this->registerModel->findAll();
        $data=[
            'title' => 'Register',
            'registerpeserta' => $registerpeserta
        ];
        
        echo view ('layout/header',$data);
        echo view ('pages/register');
        echo view ('layout/footer');
    }

    public function addregister()
    {
        //session();
        $registerpeserta= $this->registerModel->findAll();
        $data=[
            'title' => 'Add Registration',
            'registerpeserta' => $registerpeserta,
            'validation' => \Config\Services::validation()
        ];
        echo view ('layout/header');
        echo view ('pages/addregister',$data);
        echo view ('layout/footer');
    }
    public function __construct()
    {
        $this->registerModel = new registerpesertaModel();
    }
    public function save(){
        if(!$this->validate([
            'namapeserta' => [
                'required' => 'required',
                'errors' =>[
                    'required' => '{field} harus diisi',
                ]
                ],
                'fotoktm' =>[
                'rules'=> 'uploaded[fotoktm]|is_image[fotoktm]|mime_in[fotoktm,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'pilih gambar Foto KTM terlebihh dahulu',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang Anda pilih bukan gambar'
                ]
                ]
        ])){
            // $validation = \Config\Services::validation();
            return redirect()->to('/pages/addregister')->withInput();   
            // return redirect()->to('/pages/addregister')->withInput()->with('validation', $validation);
        }
        $filektm = $this->request->getFile('fotoktm');
        $namaktm = $filektm -> getRandomName();
        //pindah ke folder imgg
        $filektm->move('img', $namaktm);

        $this->registerModel->save([
            'idregister' => $this->request->getVar('idregister'),
            'namapeserta' => $this->request->getVar('namapeserta'),
            'nim' => $this->request->getVar('nim'),
            'email' => $this->request->getVar('email'),
            'telp' => $this->request->getVar('telp'),
            'institusi' => $this->request->getVar('institusi'),
            'alamat' => $this->request->getVar('alamat'),
            'jeniskegiatan' => $this->request->getVar('jeniskegiatan'),
            'namakegiatan' => $this->request->getVar('namakegiatan'),
            'fotoktm' => $namaktm
            ]);
            session()->setFlashdata('pesan','Data berhasil ditambahkan');
            return redirect()->to('/pages/register');
        }
        public function delete($idregister){
        
            $this->registerModel->delete($idregister);
            session()->setFlashdata('pesan','Data berhasil dihapus');
            return redirect()->to('/pages/register');
        }
        public function editevent($id=null){
        $dafkegModel =$this->dafkegModel->find($id);
                $data=[
                    'title' => 'Edit Form | WEB Event Organizer',
                    'validation' =>  \Config\Services::validation(), 
                    $dafkegModel = $this->dafkegModel->find($id)
                    
                    
                ];
                if (is_array($dafkegModel)) {
                    $data['dafkegModel'] = $dafkegModel;
                }
                echo view ('layout/header', $data);
                echo view ('pages/editevent');
                echo view ('layout/footer');
                //return redirect()->to('/pages/editregis');
        }

    public function updateEvent(){
            //untuk ngecheck data :
            // dd($this->request->getVar());
    
            //validasi input
            if(!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi !'
                    ]
                    ],
                'date' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi !'
                    ]
                    ],
                'time' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi !'
                    ]
                    ], 
                'time2' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi !'
                        ]
                        ], 
                'lokasi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi !'
                        ]
                        ], 
                'benefit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi !'
                        ]
                        ],
                'poster' => [
                    'rules' => 'uploaded[poster]|is_image[poster]|mime_in[poster,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'pilih gambar Poster Event terlebihh dahulu',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang Anda pilih bukan gambar'
                        ]
                        ]
            ])) {
                // $validation = \Config\Services::validation();
                //dd($validation);
                // $data['validation'] = $validation;
                return redirect()->to('/pages/editevent/' . $id)->withInput();
            }
    
            $fileposter = $this->request->getFile('poster');
            $namaposter = $fileposter->getRandomName();
            //pindah ke folder imgg
            $fileposter->move('foto', $namaposter);
        
            $this->dafkegModel->updateevent([
                'id' =>$this->request->getVar('id'),
                'nama' =>$this->request->getVar('nama'),
                'jenis' =>$this->request->getVar('jenis'),
                'date' =>$this->request->getVar('date'),
                'time' =>$this->request->getVar('time'),
                'time2' =>$this->request->getVar('time2'),
                'lokasi' =>$this->request->getVar('lokasi'),
                'benefit' =>$this->request->getVar('benefit'),
                'poster' =>$namaposter
            ]);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to('/pages/event');
        }

        public function editevent($id=null){
            $dafkegModel =$this->dafkegModel->find($id);
                    $data=[
                        'title' => 'Edit Form | WEB Event Organizer',
                        'validation' =>  \Config\Services::validation(), 
                        $dafkegModel = $this->dafkegModel->find($id)
                        
                        
                    ];
                    if (is_array($dafkegModel)) {
                        $data['dafkegModel'] = $dafkegModel;
                    }
                    echo view ('layout/header', $data);
                    echo view ('pages/editevent');
                    echo view ('layout/footer');
                    //return redirect()->to('/pages/editregis');
            }
    
        public function updateEvent(){
                //untuk ngecheck data :
                // dd($this->request->getVar());
        
                //validasi input
                if(!$this->validate([
                    'nama' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus diisi !'
                        ]
                        ],
                    'date' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus diisi !'
                        ]
                        ],
                    'time' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus diisi !'
                        ]
                        ], 
                    'time2' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus diisi !'
                            ]
                            ], 
                    'lokasi' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus diisi !'
                            ]
                            ], 
                    'benefit' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} harus diisi !'
                            ]
                            ],
                    'poster' => [
                        'rules' => 'uploaded[poster]|is_image[poster]|mime_in[poster,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'uploaded' => 'pilih gambar Poster Event terlebihh dahulu',
                            'is_image' => 'Yang anda pilih bukan gambar',
                            'mime_in' => 'Yang Anda pilih bukan gambar'
                            ]
                            ]
                ])) {
                    // $validation = \Config\Services::validation();
                    //dd($validation);
                    // $data['validation'] = $validation;
                    return redirect()->to('/pages/editevent/' . $id)->withInput();
                }
        
                $fileposter = $this->request->getFile('poster');
                $namaposter = $fileposter->getRandomName();
                //pindah ke folder imgg
                $fileposter->move('foto', $namaposter);
            
                $this->dafkegModel->updateevent([
                    'id' =>$this->request->getVar('id'),
                    'nama' =>$this->request->getVar('nama'),
                    'jenis' =>$this->request->getVar('jenis'),
                    'date' =>$this->request->getVar('date'),
                    'time' =>$this->request->getVar('time'),
                    'time2' =>$this->request->getVar('time2'),
                    'lokasi' =>$this->request->getVar('lokasi'),
                    'benefit' =>$this->request->getVar('benefit'),
                    'poster' =>$namaposter
                ]);
                session()->setFlashdata('pesan', 'Data Berhasil Diubah');
                return redirect()->to('/pages/event');
            }
        