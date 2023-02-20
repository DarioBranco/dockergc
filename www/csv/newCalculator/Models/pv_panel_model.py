from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class pv_panel_model(Base):
	__tablename__ = 'pv_panel_model'
	id = Column(Integer, primary_key=True)
	MakeM = Column(Text)
	Year = Column(Text)
	Type = Column(Text)
	PeakPower = Column(Text)
	Size = Column(Text)
	Noct = Column(Text)
	Albedo = Column(Text)
	TempCoeffP = Column(Text)
	TempCoeffU = Column(Text)
	TempCoeffI = Column(Text)

