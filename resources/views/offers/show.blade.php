<!-- show.blade.php -->
<h2>{{ $offer->offre_name }}</h2>
<p>{{ $offer->laboratoire }}</p>

<h3>Related Products</h3>
@if ($offer->produits->isEmpty())
    <p>No products associated with this offer.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Discount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offer->produits as $produit)
                <tr>
                    <td>{{ $produit->nom }}</td> <!-- Corrected this line -->
                    <td>{{ $produit->pivot->quantity }}</td> <!-- Accessing pivot data -->
                    <td>{{ $produit->pivot->discount }}</td> <!-- Accessing pivot data -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
