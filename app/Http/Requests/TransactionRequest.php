<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Déterminer si l'utilisateur est autorisé à faire cette requête.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Règles de validation applicables à la requête.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'type' => 'required|string|in:gros,details',
            'designation' => 'required|string|in:entrée,sortie',
            'quantity' => 'required|integer|min:1',
            'purchase_price_per_locker' => 'required|numeric',
            'sale_price_per_locker' => 'required|numeric',
            'purchase_price_per_bottle' => 'required|numeric',
            'selling_price_per_bottle' => 'required|numeric',
            'date_op' => 'required|date',
        ];
    }

    /**
     * Messages personnalisés pour les erreurs de validation.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'product_id.required' => 'Le produit est requis.',
            'product_id.exists' => 'Le produit sélectionné n\'existe pas.',
            'type.required' => 'Le type de transaction est requis.',
            'type.in' => 'Le type doit être "gros" ou "détails".',
            'designation.required' => 'La désignation est requise.',
            'designation.in' => 'La désignation doit être "entrée" ou "sortie".',
            'quantity.required' => 'La quantité est requise.',
            'quantity.integer' => 'La quantité doit être un nombre entier.',
            'purchase_price_per_locker.required' => 'Le prix d\'achat par casier est requis.',
            'sale_price_per_locker.required' => 'Le prix de vente par casier est requis.',
            'purchase_price_per_bottle.required' => 'Le prix d\'achat par bouteille est requis.',
            'selling_price_per_bottle.required' => 'Le prix de vente par bouteille est requis.',
            'date_op.required' => 'La date de l\'opération est requise.',
        ];
    }
}
