import React from "react";

export default function MovieCard({ movie }) {
  return (
    <div className="bg-gray-800 p-4 rounded-xl shadow-lg">
      <img src={movie.image} alt={movie.title} className="rounded-md mb-4" />
      <h2 className="text-2xl font-semibold">{movie.title}</h2>
      <p className="text-sm text-gray-300">{movie.description}</p>
    </div>
  );
}
