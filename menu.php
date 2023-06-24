<?php
class menu
{
    public function fetch()
    {
        $dados = file_get_contents("pacientes.json");
        $dadosJson = json_decode($dados, true);
        $html = " 
        <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data nascimento</th>
            <th>Email</th>
            <th>Endereco</th>
            <th>Contacto</th>
            <th>Opcao</th>
        </tr>
        ";
        if (count($dadosJson) != 0) {
            foreach ($dadosJson as $item) {
                $html .= "
                <tr>
                    <td><p id='id" . $item["id"] . "' contenteditable='true'>" . $item["id"] . "</p></td>
                    <td><p id='nome" . $item["nome"] . "' contenteditable='true'>" . $item["nome"] . "</p></td>
                    <td><p id='datan" . $item["datan"] . "' contenteditable='true'>" . $item["datan"] . "</p></td>
                    <td><p id='email" . $item["email"] . "' contenteditable='true'>" . $item["email"] . "</p></td>
                    <td><p id='endereco" . $item["endereco"] . "' contenteditable='true'>" . $item["endereco"] . "</p></td>
                    <td><p id='contacto" . $item["contacto"] . "' contenteditable='true'>" . $item["contacto"] . "</p></td>
                    <td>
                        <i onclick='edit(".$item['id'].")' class='fa-solid fa-check green'></i>
                        <i onclick='del(".$item['id'].")' class='fa-solid fa-xmark red'></i>
                    </td>
                </tr>
                ";
            }
        }
        $html .= "
            <tr>
                <td><p id='id' contenteditable='true'></p></td>
                <td><p id='nome' contenteditable='true'></p></td>
                
                <td><p id='datan' contenteditable='true'></p></td>
                <td><p id='email' contenteditable='true'></p></td>
                <td><p id='endereco' contenteditable='true'></p></td>
                <td><p id='contacto' contenteditable='true'></p></td>
                <td>
                    <i onclick='addnew();' class='fa-solid fa-check green'></i>
                    <i onclick='cancel();' class='fa-solid fa-xmark red'></i>
                </td>
            </tr>
        </table>";
        echo $html;
    }
    public function addnew($id, $nome,  $datan, $email, $endereco, $contacto)
    {
        $dados = file_get_contents("pacientes.json");
        $dadosJson = json_decode($dados, true);
        $i = count($dadosJson);
        $i++;
        $novosDados = array('id' => $i, 'nome' => $nome, 'datan' => $datan, 'email' => $email, 'endereco' => $endereco, 'contacto' => $contacto);
        $dadosJson =$novosDados;
        $dadosFinais = json_encode($dadosJson);
        if(file_put_contents("pacientes.json", $dadosFinais)){
            echo "Novo paciente adicionado com sucesso!";
        }else{
            echo "Erro ao adicionar novo paciente!";
        }
    }
    public function del($id){
        $dados = file_get_contents("pacientes.json");
        $dadosJson = json_decode($dados, true);
        $id--;
        unset($dadosJson[$id]);
        $dadosJson = array_values($dadosJson);
        $dadosFinais = json_encode($dadosJson);
        if(file_put_contents("pacientes.json", $dadosFinais)){
            echo "Novo paciente Removido com sucesso!";
        }else{
            echo "Erro ao remover paciente!";
        }

    }

    public function edit($id, $nome, $datan, $email, $endereco, $contacto){
        $dados = file_get_contents("pacientes.json");
        $dadosJson = json_decode($dados, true);
        $id--;
        $dadosJson[$id]['id'] = $id;
        $dadosJson[$id]['nome'] = $nome;
        $dadosJson[$id]['datan'] = $datan;
        $dadosJson[$id]['email'] = $email;
        $dadosJson[$id]['endereco'] = $endereco;
        $dadosJson[$id]['contacto'] = $contacto;

        $dadosJson = array_values($dadosJson);
        $dadosFinais = json_encode($dadosJson);
        if(file_put_contents("pacientes.json", $dadosFinais)){
            echo "Actualizado com sucesso com sucesso!";
        }else{
            echo "Erro ao actualizar paciente!";
        }

    }
}
