from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()

class grid_mix_in_local_grid(Base):
	__tablename__ = 'grid_mix_in_local_grid'
	id = Column(Integer, primary_key=True)
	LOC = Column(Text)
	Time = Column(Text)
	LRES = Column(Text)
	Batteries = Column(Text)
	V2G = Column(Text)
	Grid = Column(Text)
	SwID = Column(Text)

