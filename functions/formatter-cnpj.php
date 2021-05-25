<?php

function formatCnpjCpf($value): string
{
	$CPF_LENGTH = 11;
	$cnpj_cpf = preg_replace('/\D/', '', $value);

	if (strlen($cnpj_cpf) === $CPF_LENGTH) {
		return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
	}

	return preg_replace("/(\d{2})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);

}

echo formatCnpjCpf('52630046800'). PHP_EOL;
echo formatCnpjCpf('13759900000169'). PHP_EOL;