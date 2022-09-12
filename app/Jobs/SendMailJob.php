<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\PHPMailer;
use App\Models\SMTP;
use App\Models\Exception;
use Illuminate\Support\Facades\Log;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $dados;

    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    public function handle()
    {
        $clnome = $this->dados['nome'];
        $cltelefone = $this->dados['telefone'];
        $clemail = $this->dados['email'];
        $clmsg = $this->dados['msg'];
        
        $informacoes = "Nome: ".$clnome."<br>Telefone: ".$cltelefone."<br>Email: ".$clemail."<br>Mensagem: ".$clmsg."<br><br>Atenciosamente,<br>Suporte@flybisistemas.com.br";
        
        $corpomsg = "Prezados,<br><br>Uma nova solicitação de contato foi enviado para <b>Flybi Sistemas</b>!<br>Segue as informações do cliente.<br><br>".$informacoes;

        $email = 'sistemasflybi@gmail.com'; //SEU 
        $senha = 'pqOMkgITY7tsh9uGX2aM'; //SUA SENHA
        
        try {
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $email;
            $mail->Password = $senha;
            $mail->Port = 587;
            $mail->setFrom($email, 'Flybi Sistemas');
            $mail->addAddress('raynder4@gmail.com', 'Destinatario');
            $mail->isHTML(true);$mail->Subject = 'Contato Flybi Sistemas!';
            $mail->Body = $corpomsg;
            $erro = $mail->send();
            Log::info($erro);
            if ($mail->send()) {
                Log::info('enviado com sucesso.');
            }
            else{
                Log::error('erro ao enviar email.');
            }
        }
        catch (\Exception $e){echo "Erro ao encontrar pagina solicitada: {$mail->ErrorInfo}";
            Log::error('erro');
        }
    }
}
